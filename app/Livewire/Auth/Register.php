<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public $title = 'Kantinku - Register';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.register');
    }
}
