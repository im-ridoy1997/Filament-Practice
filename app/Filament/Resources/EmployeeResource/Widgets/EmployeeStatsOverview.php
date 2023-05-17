<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Employee;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Employess', Employee::all()->count()),
            Card::make('Bounce rate', '21%'),
            Card::make('Average time on page', '3:12'),
        ];
    }
}
