<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $title = 'Change Password';

    #[Validate('required|string|min:8|max:255')]
    public $old_password;

    #[Validate('required|string|min:8|max:255')]
    public $new_password;

    #[Validate('required|string|min:8|max:255|same:new_password')]
    public $new_password_confirmation;

    public $photo;

    public function mount()
    {
        $this->photo = Auth::user()->photo;
    }

    public function changePassword()
    {
        $this->validate();

        $user = Auth::user();

        if (!Hash::check($this->old_password, $user->password)) {
            $this->addError('old_password', 'Old password is incorrect!');
            return;
        }

        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->reset(['old_password', 'new_password', 'new_password_confirmation']);

        session()->flash('success', 'Password berhasil diubah.');

        return $this->redirectRoute('me', navigate: true);
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.change-password');
    }
}
