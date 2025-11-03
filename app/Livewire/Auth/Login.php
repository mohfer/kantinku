<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    public $title = 'Kantinku - Login';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    public function login()
    {
        $credentials = $this->validate();

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended(route('home'));
        }

        $this->addError('login', __('auth.failed'));
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.login');
    }
}
