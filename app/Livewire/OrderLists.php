<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderLists extends Component
{
    // Hilangkan property orders, buat jadi method getOrdersProperty

    public function getOrdersProperty()
    {
        $user = Auth::user();

        return Order::with(['merchant', 'user', 'orderItems.product', 'payment'])
            ->whereIn('order_status', ['PENDING', 'PROCESSING', 'READY'])
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
        Order::where('id', $id)->update(['order_status' => 'CANCELED', 'completed_at' => now()]);
    }

    public function markAsReady($id)
    {
        Order::where('id', $id)->update(['order_status' => 'READY']);
    }

    public function markAsCompleted($id)
    {
        Order::where('id', $id)->update([
            'order_status' => 'COMPLETED',
            'completed_at' => now(),
        ]);
    }

    public function render()
    {
        return view('livewire.order-lists', [
            'orders' => $this->orders
        ]);
    }
}
