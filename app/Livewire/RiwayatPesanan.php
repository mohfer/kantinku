<?php

namespace App\Livewire;

use Livewire\Component;

class RiwayatPesanan extends Component
{
    public $title = 'Riwayat Pesanan';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.riwayat-pesanan');
    }
}
