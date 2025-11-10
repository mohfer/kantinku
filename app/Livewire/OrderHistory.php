<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderHistory extends Component
{
    public $title = 'Order History';

    public $orders = [];

    public function mount()
    {
        $this->orders = Order::with(['payment', 'merchant.user'])
            ->where('user_id', Auth::id())
            ->whereIn('order_status', ['COMPLETED', 'CANCELED'])
            ->orderBy('completed_at', 'desc')
            ->get();
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.order-history');
    }
}
