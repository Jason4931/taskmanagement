<?php

namespace App\Filament\Resources\TugasResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Tugas;

class CountTugas extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Tugas', Tugas::count()),
            Stat::make('To Do', Tugas::where('status', '=', 'To Do')->count()),
            Stat::make('In Progress', Tugas::where('status', '=', 'In Progress')->count()),
            Stat::make('Done', Tugas::where('status', '=', 'Done')->count()),
        ];
    }
}
