<?php

namespace App\Livewire;

use Livewire\Component;

class Pesanan extends Component
{
    public $title = 'Kantinku - Pesanan';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.pesanan');
    }
}
