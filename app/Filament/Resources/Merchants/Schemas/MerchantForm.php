<?php

namespace App\Filament\Resources\Merchants\Schemas;

use App\Models\User;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TimePicker;

class MerchantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn() => Auth::user()->role === 'merchant' ? Auth::id() : null)
                    ->visible(fn() => Auth::user()->role === 'merchant'),
                Select::make('user_id')
                    ->label('User')
                    ->options(function ($record) {
                        $query = User::query()
                            ->where('role', 'merchant')
                            ->whereDoesntHave('merchant', function ($q) {
                                $q->whereNull('deleted_at');
                            });

                        if ($record && $record->user_id) {
                            $query->orWhere('id', $record->user_id);
                        }

                        return $query->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required()
                    ->visible(fn() => Auth::user()->role === 'admin'),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('location')
                    ->required(),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('images/merchants')
                    ->image()
                    ->maxSize(2048)
                    ->required()
                    ->dehydrateStateUsing(function ($state, $record) {
                        if ($record && $record->image && $record->image !== $state) {
                            Storage::disk('public')->delete($record->image);
                        }
                        return $state;
                    }),
                TimePicker::make('open_time')
                    ->seconds(false)
                    ->required(),
                TimePicker::make('close_time')
                    ->seconds(false)
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
