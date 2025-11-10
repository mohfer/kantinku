<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $title = 'Reset Password';

    public $token;
    public $email;

    #[Validate('required|string|min:8|max:255')]
    public $new_password;

    #[Validate('required|string|min:8|max:255|same:new_password')]
    public $new_password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }

    public function resetPassword()
    {
        $this->validate();

        $record = DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->where('token', $this->token)
            ->first();

        if (!$record) {
            $this->addError('token', 'Invalid token or email.');
            return;
        }

        $user = User::where('email', $this->email)->first();
        $user->password = Hash::make($this->new_password);
        $user->save();

        DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->delete();

        session()->flash('success', 'Password has been reset successfully.');

        return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.reset-password');
    }
}
