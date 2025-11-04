<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class ResetPassword extends Component
{
    public $title = 'Reset Password';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.reset-password');
    }
}
