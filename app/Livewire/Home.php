<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $title = 'Home';

    public $name = '';
    public $merchant;
    public $orders = [];

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->merchant = Cart::where('user_id', Auth::id())->first()?->merchant;

        $this->orders = Order::with(['merchant', 'orderItems'])
            ->where('user_id', Auth::id())
            ->whereIn('order_status', ['PENDING', 'PROCESSING'])
            ->latest()
            ->limit(2)
            ->get();
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.home');
    }
}
