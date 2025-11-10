<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Auth;

class OrderLists extends Component
{
    protected $whatsappService;

    public function boot(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function getOrdersProperty()
    {
        $user = Auth::user();

        return Order::with(['merchant', 'user', 'orderItems.product', 'payment'])
            ->whereIn('order_status', ['PENDING', 'PROCESSING', 'READY'])
            ->whereHas('payment', function ($query) {
                $query->where(function ($q) {
                    $q->where('method', 'cash')
                        ->orWhere(function ($q2) {
                            $q2->where('method', 'qris')
                                ->where('status', 'PAID');
                        });
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
        $order = Order::with(['user', 'merchant', 'orderItems.product'])->find($id);

        if ($order) {
            $order->update(['order_status' => 'PROCESSING']);

            $this->whatsappService->sendOrderProcessingMessage($order);
        }
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
        $order = Order::with(['user', 'merchant', 'orderItems.product'])->find($id);

        if ($order) {
            $order->update(['order_status' => 'READY']);

            $this->whatsappService->sendOrderReadyMessage($order);
        }
    }

    public function markAsCompleted($id)
    {
        $order = Order::with(['payment', 'user', 'merchant', 'orderItems.product'])->find($id);

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

            $this->whatsappService->sendOrderCompletedMessage($order);
        }
    }

    public function render()
    {
        return view('livewire.order-lists', [
            'orders' => $this->orders
        ]);
    }
}
