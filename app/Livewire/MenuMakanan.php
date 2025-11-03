<?php

namespace App\Livewire;

use Livewire\Component;

class MenuMakanan extends Component
{
    public function render()
    {
        view()->share('title', 'KantinKu - Menu Makanan');
        return view('livewire.menu-makanan');
    }
}
