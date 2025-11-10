<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderHistoryList extends Component
{
    public function getOrdersProperty()
    {
        $user = Auth::user();

        return Order::with(['merchant', 'user', 'orderItems.product', 'payment'])
            ->where('order_status', 'COMPLETED')
            ->when($user->role === 'merchant', function ($query) use ($user) {
                $query->whereHas('merchant', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                });
            })
            ->orderBy('completed_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.order-history-list', [
            'orders' => $this->orders
        ]);
    }
}
