<?php

namespace App\Livewire;

use Livewire\Component;

class StatusPemesanan extends Component
{
    public $title = 'Kantinku - Status Pemesanan';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.status-pemesanan');
    }
}