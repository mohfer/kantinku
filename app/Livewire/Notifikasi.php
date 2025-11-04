<?php

namespace App\Livewire;

use Livewire\Component;

class Notifikasi extends Component
{
    public $title = 'Notifikasi';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.notifikasi');
    }
}
