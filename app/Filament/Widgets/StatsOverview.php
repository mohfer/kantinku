<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $merchant = $user->merchant;

        return [
            Stat::make('Pesanan hari ini', function () use ($merchant) {
                return Order::where('merchant_id', $merchant->id)
                    ->whereDate('created_at', now())
                    ->count();
            }),
            Stat::make('Pendapatan hari ini', function () use ($merchant) {
                $total = Order::where('merchant_id', $merchant->id)
                    ->whereDate('created_at', now())
                    ->where('order_status', 'COMPLETED')
                    ->sum('total');

                return 'Rp ' . number_format($total, 0, ',', '.');
            }),
            Stat::make('Jumlah produk', function () use ($merchant) {
                return Product::where('merchant_id', $merchant->id)->count();
            }),
        ];
    }
}
