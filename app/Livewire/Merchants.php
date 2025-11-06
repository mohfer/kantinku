<?php

namespace App\Livewire;

use App\Models\Merchant;
use App\Models\Product;
use Livewire\Component;

class Merchants extends Component
{
    public $title = 'Merchants';

    public $merchants = [];

    public $products = [];

    public $search = '';

    public function mount()
    {
        $this->merchants = Merchant::where('is_active', true)->get();
    }

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $this->merchants = Merchant::where('is_active', true)->get();
            $this->products = [];
        } else {
            $this->products = Product::with('merchant')
                ->where('name', 'like', '%' . $this->search . '%')
                ->where('is_available', true)
                ->whereHas('merchant', function ($query) {
                    $query->where('is_active', true);
                })
                ->get();
            $this->merchants = [];
        }
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.merchants');
    }
}
