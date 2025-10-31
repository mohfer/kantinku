<?php

namespace App\Livewire;

use Livewire\Component;

class Warung extends Component
{
    public $title = 'Kantinku - Warung';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.warung');
    }
}
