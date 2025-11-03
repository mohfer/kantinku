<?php

namespace App\Livewire;

use Livewire\Component;

class RiwayatPesanan extends Component
{
    public function render()
    {
        view()->share('title', 'KantinKu - Riwayat Pesanan');
        return view('livewire.riwayat-pesanan');
    }
}
