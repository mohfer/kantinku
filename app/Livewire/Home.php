<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $title = 'Home';

    public $name = '';
    public $merchant;
    public $orders = [];
    public $popularProducts = [];

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

        $this->popularProducts = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->whereHas('order', function ($query) {
                $query->whereDate('created_at', today());
            })
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->limit(3)
            ->with(['product.merchant'])
            ->get()
            ->map(function ($item) {
                return [
                    'product' => $item->product,
                    'total_quantity' => $item->total_quantity
                ];
            });
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.home');
    }
}
