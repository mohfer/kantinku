<?php

namespace App\Livewire;

use Livewire\Component;

class Me extends Component
{
    public $title = 'Kantinku - Me';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.me');
    }
}
