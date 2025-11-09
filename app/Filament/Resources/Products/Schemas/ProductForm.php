<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('merchant_id')
                    ->default(fn() => Auth::user()->role === 'merchant'
                        ? Auth::user()->merchant->id
                        : null)
                    ->visible(fn() => Auth::user()->role === 'merchant'),
                Select::make('merchant_id')
                    ->relationship('merchant', 'name')
                    ->visible(fn() => Auth::user()->role === 'admin'),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp '),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                Toggle::make('is_available')
                    ->required(),
            ]);
    }
}
