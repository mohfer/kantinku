<?php

namespace App\Livewire;

use Livewire\Component;

class OrderVerification extends Component
{
    public $title = 'Order Verification';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.order-verification');
    }
}
