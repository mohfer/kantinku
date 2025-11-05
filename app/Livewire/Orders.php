<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Orders extends Component
{
    public $title = 'Orders';

    public $orders = [];

    public function mount()
    {
        $this->orders = Order::with(['payment', 'merchant.user'])
            ->where('user_id', Auth::id())
            ->whereIn('order_status', ['PENDING', 'PROCESSING', 'READY'])
            ->get();
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.orders');
    }
}
