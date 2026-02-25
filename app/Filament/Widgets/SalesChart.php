<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pembelian;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Penjualan 7 Hari Terakhir';
    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);

            $total = Pembelian::whereDate('created_at', $date)
                ->sum('bayar');

            $data[] = $total;
            $labels[] = $date->format('d M');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // bisa diganti 'bar'
    }
    public static function canView(): bool
    {
    return false;
    }
}
