<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class EmailSent extends Component
{
    public $title = 'Email Sent';

    public $email;

    public function mount($email)
    {
        $this->email = $email;
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.email-sent');
    }
}
