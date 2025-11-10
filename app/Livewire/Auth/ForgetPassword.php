<?php

namespace App\Livewire\Auth;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPasswordNotification;

class ForgetPassword extends Component
{
    public $title = 'Forget Password';

    #[Validate('required|email|exists:users,email|max:255')]
    public $email;

    public function forgetPassword()
    {
        $this->validate();

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $this->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        $user = User::where('email', $this->email)->first();

        Notification::send($user, new ResetPasswordNotification($token, $this->email));

        return $this->redirectRoute('email-sent', ['email' => $this->email], navigate: true);
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.auth.forget-password');
    }
}
