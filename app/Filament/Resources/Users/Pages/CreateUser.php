<?php

namespace App\Filament\Resources\Users\Pages;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserPasswordMail;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Users\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $password = Str::random(10);
        $data['password'] = Hash::make($password);

        $user = UserResource::getModel()::create($data);

        $user->notify(new UserPasswordMail($user, $password));

        return $user;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
