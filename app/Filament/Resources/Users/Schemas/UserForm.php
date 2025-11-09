<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(15),
                Radio::make('role')
                    ->label('Role')
                    ->options([
                        'merchant' => 'Merchant',
                        'admin' => 'Admin',
                    ])
                    ->inline()
                    ->required()
            ]);
    }
}
