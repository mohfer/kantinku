<?php

namespace App\Livewire;

use Livewire\Component;

class Verifikasi extends Component
{
    public $title = 'Verifikasi Pembayaran';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.verifikasi');
    }
}
