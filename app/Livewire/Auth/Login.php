<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $title = 'Kantinku - Login';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.login');
    }
}
