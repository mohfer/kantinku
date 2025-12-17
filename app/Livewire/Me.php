<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;

class Me extends Component
{
    use WithFileUploads;

    public $title = 'Me';

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|max:15')]
    public $phone = '';

    #[Validate('nullable|image|max:2048')]
    public $photo;

    public $currentPhoto;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
        $this->currentPhoto = Auth::user()->photo;
    }

    public function updateProfile()
    {
        $this->validate();

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;

        if ($this->photo) {
            if ($user->photo) {
                Storage::disk('public')->delete('images/profiles/' . $user->photo);
            }

            $photoName = time() . '_' . $this->photo->getClientOriginalName();
            $this->photo->storeAs('images/profiles', $photoName, 'public');
            $user->photo = $photoName;
        }

        $user->save();

        session()->flash('success', 'Profile updated successfully.');

        return $this->redirectRoute('me', navigate: true);
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.me');
    }
}
