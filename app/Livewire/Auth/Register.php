<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{
    public $title = 'Register';

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email|max:255|unique:users,email')]
    public $email;

    #[Validate('required|string|min:8|max:255')]
    public $password;

    #[Validate('required|string|same:password|max:255')]
    public $password_confirmation;

    #[Validate('required|string|max:15')]
    public $phone;

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'Registration successful! Please log in.');
        return redirect()->route('login');
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.register');
    }
}
