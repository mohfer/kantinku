<?php

namespace App\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public $title = 'Notifications';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.notifications');
    }
}
