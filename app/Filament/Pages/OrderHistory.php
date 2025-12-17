<?php

namespace App\Filament\Pages;

use Filament\Support\Icons\Heroicon;
use BackedEnum;
use Filament\Pages\Page;

class OrderHistory extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected string $view = 'filament.pages.order-history';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->role === 'merchant';
    }

    public static function canAccess(): bool
    {
        return auth()->user()->role === 'merchant';
    }
}
