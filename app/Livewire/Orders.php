<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Orders extends Component
{
    public $title = 'Orders';

    public $orders = [];

    public $paymentStatus = '';

    public function mount()
    {
        $this->orders = Order::with(['payment', 'merchant.user'])
            ->where('user_id', Auth::id())
            ->whereIn('order_status', ['PENDING', 'PROCESSING', 'READY'])
            ->get();

        $this->paymentStatus = Payment::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id())
                ->whereIn('order_status', ['PENDING', 'PROCESSING', 'READY']);
        })->pluck('status')->unique()->implode(', ');
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.orders');
    }
}
