<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        return auth()->user()->role === 'merchant';
    }

    protected function getStats(): array
    {
        $merchant = auth()->user()->merchant;

        $todayOrders = Order::where('merchant_id', $merchant->id)
            ->whereDate('created_at', today())
            ->count();

        $yesterdayOrders = Order::where('merchant_id', $merchant->id)
            ->whereDate('created_at', now()->subDay())
            ->count();

        $ordersDiff = $todayOrders - $yesterdayOrders;
        $ordersIcon = $ordersDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';

        $todayRevenue = Order::where('merchant_id', $merchant->id)
            ->whereDate('created_at', today())
            ->where('order_status', 'COMPLETED')
            ->sum('total');

        $yesterdayRevenue = Order::where('merchant_id', $merchant->id)
            ->whereDate('created_at', now()->subDay())
            ->where('order_status', 'COMPLETED')
            ->sum('total');

        $averageRevenue = Order::where('merchant_id', $merchant->id)
            ->whereDate('created_at', today())
            ->where('order_status', 'COMPLETED')
            ->avg('total');

        $revenueDiff = $todayRevenue - $yesterdayRevenue;
        $revenueIcon = $revenueDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';

        return [
            Stat::make('Pesanan Hari Ini', $todayOrders)
                ->description(($ordersDiff >= 0 ? '+' : '-') . abs($ordersDiff) . ' dibanding kemarin')
                ->descriptionIcon($ordersIcon),

            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($todayRevenue, 0, ',', '.'))
                ->description(($revenueDiff >= 0 ? '+' : '-') . ' Rp ' . number_format(abs($revenueDiff), 0, ',', '.') . ' dibanding kemarin')
                ->descriptionIcon($revenueIcon),

            Stat::make('Rata-rata Pendapatan', 'Rp ' . number_format($averageRevenue, 0, ',', '.'))
                ->description('Rata-rata per pesanan hari ini')
                ->descriptionIcon('heroicon-m-currency-dollar'),
        ];
    }
}
