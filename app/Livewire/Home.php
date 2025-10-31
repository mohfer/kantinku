<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $title = 'Kantinku - Home';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.home');
    }
}
