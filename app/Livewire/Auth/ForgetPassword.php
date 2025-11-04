<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class ForgetPassword extends Component
{
    public $title = 'Forget Password';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.forget-password');
    }
}
