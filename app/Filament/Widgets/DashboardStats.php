<?php

namespace App\Filament\Widgets;

use App\Models\Cart;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{

    protected static ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Pesanan', Cart::count()),
            Stat::make('Total User', User::count()),
            Stat::make('Pendapatan Bulan Ini', 'Rp. ' .  number_format(Cart::whereBetween('tanggal_222339', [date('Y-m-01'), date('Y-m-t')])->sum('total_222339'))),

        ];
    }
}
