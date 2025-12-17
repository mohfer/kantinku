<?php

namespace App\Filament\Resources\Merchants\Pages;

use App\Filament\Resources\Merchants\MerchantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMerchants extends ListRecords
{
    protected static string $resource = MerchantResource::class;

    protected function getHeaderActions(): array
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return [
                CreateAction::make(),
            ];
        }

        if ($user->role === 'merchant' && !$user->merchant()->exists()) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}
