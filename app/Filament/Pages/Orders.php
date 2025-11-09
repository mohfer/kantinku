<?php

namespace App\Filament\Pages;

use App\Models\Order;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Schemas\Components\Component;

class Orders extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected string $view = 'filament.pages.orders';
}
