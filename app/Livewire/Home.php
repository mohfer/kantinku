<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $title = 'Home';

    public $name = '';

    public function mount()
    {
        $this->name = Auth::user()->name;
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.home');
    }
}
