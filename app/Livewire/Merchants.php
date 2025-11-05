<?php

namespace App\Livewire;

use App\Models\Merchant;
use Livewire\Component;

class Merchants extends Component
{
    public $title = 'Merchants';

    public $merchants = [];

    public function mount()
    {
        $this->merchants = Merchant::where('is_active', true)->get();
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.merchants');
    }
}
