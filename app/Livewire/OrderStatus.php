<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderStatus extends Component
{
    public $title = 'Order Status';

    public $order;

    public function mount($order_number)
    {
        $this->order = Order::where('order_number', $order_number)
            ->where('user_id', Auth::id())
            ->with(['merchant.user', 'orderItems.product', 'payment'])
            ->firstOrFail();
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.order-status');
    }
}
