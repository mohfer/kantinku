<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class RevenueChart extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';

    public ?string $filter = 'today';

    public static function canView(): bool
    {
        return auth()->user()->role === 'merchant';
    }

    public function getHeading(): string
    {
        $merchant = auth()->user()->merchant;
        $dateRange = $this->getDateRange();

        $totalRevenue = Order::where('merchant_id', $merchant->id)
            ->where('order_status', 'COMPLETED')
            ->whereBetween('completed_at', $dateRange['current'])
            ->sum('total');

        $totalOrders = Order::where('merchant_id', $merchant->id)
            ->where('order_status', 'COMPLETED')
            ->whereBetween('completed_at', $dateRange['current'])
            ->count();

        $periodLabel = match ($this->filter) {
            'today' => 'Hari Ini',
            'week' => 'Minggu Ini',
            'month' => 'Bulan Ini',
            'year' => 'Tahun Ini',
            default => 'Hari Ini',
        };

        return 'Pendapatan ' . $periodLabel . ': Rp ' . number_format($totalRevenue, 0, ',', '.') . ' (' . $totalOrders . ' pesanan)';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hari Ini',
            'week' => 'Minggu Ini',
            'month' => 'Bulan Ini',
            'year' => 'Tahun Ini',
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $merchant = auth()->user()->merchant;

        $labels = [];
        $data = [];

        switch ($this->filter) {
            case 'today':
                for ($h = 0; $h < 24; $h++) {
                    $labels[] = sprintf('%02d:00', $h);
                    $hourStart = now()->startOfDay()->addHours($h);
                    $hourEnd = now()->startOfDay()->addHours($h + 1);

                    $data[] = Order::where('merchant_id', $merchant->id)
                        ->where('order_status', 'COMPLETED')
                        ->whereBetween('completed_at', [$hourStart, $hourEnd])
                        ->sum('total');
                }
                break;

            case 'week':
                $startOfWeek = now()->startOfWeek();
                for ($d = 0; $d < 7; $d++) {
                    $date = $startOfWeek->copy()->addDays($d);
                    $labels[] = $date->format('D');

                    $data[] = Order::where('merchant_id', $merchant->id)
                        ->where('order_status', 'COMPLETED')
                        ->whereDate('completed_at', $date->format('Y-m-d'))
                        ->sum('total');
                }
                break;

            case 'month':
                $daysInMonth = now()->daysInMonth;
                for ($d = 1; $d <= $daysInMonth; $d++) {
                    $date = now()->startOfMonth()->addDays($d - 1);
                    $labels[] = $date->format('d M');

                    $data[] = Order::where('merchant_id', $merchant->id)
                        ->where('order_status', 'COMPLETED')
                        ->whereDate('completed_at', $date->format('Y-m-d'))
                        ->sum('total');
                }
                break;

            case 'year':
                for ($m = 1; $m <= 12; $m++) {
                    $date = now()->startOfYear()->addMonths($m - 1);
                    $labels[] = $date->format('M');

                    $data[] = Order::where('merchant_id', $merchant->id)
                        ->where('order_status', 'COMPLETED')
                        ->whereYear('completed_at', $date->year)
                        ->whereMonth('completed_at', $date->month)
                        ->sum('total');
                }
                break;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $data,
                    'backgroundColor' => 'rgba(34,197,94,0.2)',
                    'borderColor' => 'rgba(34,197,94,1)',
                    'tension' => 0.3,
                ],
            ],
        ];
    }

    protected function getDateRange(): array
    {
        return match ($this->filter) {
            'today' => [
                'current' => [now()->startOfDay(), now()->endOfDay()],
            ],
            'week' => [
                'current' => [now()->startOfWeek(), now()->endOfWeek()],
            ],
            'month' => [
                'current' => [now()->startOfMonth(), now()->endOfMonth()],
            ],
            'year' => [
                'current' => [now()->startOfYear(), now()->endOfYear()],
            ],
            default => [
                'current' => [now()->startOfDay(), now()->endOfDay()],
            ],
        };
    }
}
