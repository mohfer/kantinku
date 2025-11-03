<?php

namespace App\Livewire;

use Livewire\Component;

class DetailProduct extends Component
{
    public function render()
    {
        view()->share('title', 'KantinKu - Detail Product');
        return view('livewire.detail-product');
    }
}
