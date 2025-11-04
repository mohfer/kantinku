<?php

namespace App\Livewire;

use Livewire\Component;

class ChangePassword extends Component
{
    public $title = 'Change Password';

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.change-password');
    }
}
