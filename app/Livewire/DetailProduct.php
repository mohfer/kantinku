<?php

namespace App\Livewire;

use Livewire\Component;

class DetailProduct extends Component
{
    public $title = 'Detail Product';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.detail-product');
    }
}
