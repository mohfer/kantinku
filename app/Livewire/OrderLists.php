<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderLists extends Component
{
    public function getOrdersProperty()
    {
        $user = Auth::user();

        return Order::with(['merchant', 'user', 'orderItems.product', 'payment'])
            ->whereIn('order_status', ['PENDING', 'PROCESSING', 'READY'])
            ->where(function ($query) {
                $query->whereHas('payment', function ($q) {
                    $q->where('method', 'cash');
                })->orWhereHas('payment', function ($q) {
                    $q->where('method', 'qris')
                        ->where('status', 'PAID');
                });
            })
            ->when($user->role === 'merchant', function ($query) use ($user) {
                $query->whereHas('merchant', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                });
            })
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function acceptOrder($id)
    {
        Order::where('id', $id)->update(['order_status' => 'PROCESSING']);
    }

    public function rejectOrder($id)
    {
        $order = Order::with('payment')->find($id);

        if ($order) {
            $order->update([
                'order_status' => 'CANCELED',
                'payment_status' => 'FAILED',
                'completed_at' => now(),
            ]);

            if ($order->payment) {
                $order->payment->update([
                    'status' => 'FAILED',
                    'paid_at' => null,
                ]);
            }
        }
    }

    public function markAsReady($id)
    {
        Order::where('id', $id)->update(['order_status' => 'READY']);
    }

    public function markAsCompleted($id)
    {
        $order = Order::with('payment')->find($id);

        if ($order) {
            $order->update([
                'order_status' => 'COMPLETED',
                'payment_status' => 'PAID',
                'completed_at' => now(),
            ]);

            if ($order->payment) {
                $order->payment->update([
                    'status' => 'PAID',
                    'paid_at' => now(),
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.order-lists', [
            'orders' => $this->orders
        ]);
    }
}
