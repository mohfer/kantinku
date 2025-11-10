<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Merchant;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SistemStats extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        return auth()->user()->role === 'admin';
    }

    protected function getStats(): array
    {
        $totalUsers = User::where('role', 'customer')->count();
        $totalMerchants = Merchant::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        $newUsersThisMonth = User::where('role', 'customer')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $newMerchantsThisMonth = Merchant::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $todayOrders = Order::whereDate('created_at', today())->count();

        $newProductsThisMonth = Product::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        return [
            Stat::make('Total Pengguna', $totalUsers)
                ->description($newUsersThisMonth . ' pengguna baru bulan ini')
                ->descriptionIcon('heroicon-m-user-group'),

            Stat::make('Total Merchant', $totalMerchants)
                ->description($newMerchantsThisMonth . ' merchant baru bulan ini')
                ->descriptionIcon('heroicon-m-building-storefront'),

            Stat::make('Total Produk', $totalProducts)
                ->description($newProductsThisMonth . ' produk baru bulan ini')
                ->descriptionIcon('heroicon-m-shopping-bag'),

            Stat::make('Total Pesanan', $totalOrders)
                ->description($todayOrders . ' pesanan hari ini')
                ->descriptionIcon('heroicon-m-clipboard-document-list'),
        ];
    }
}
