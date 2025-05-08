<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Tugas;

class TugasForm extends ChartWidget
{
    protected static ?string $heading = 'Tugas Chart';
    protected int|string|array $columnSpan = 2;

    protected function getData(): array
    {
        return [
            'labels'   => ['To Do', 'In Progress', 'Done'],
            'datasets' => [
                [
                    'label' => 'Tugas by Status',
                    'data'  => [
                        Tugas::where('status', 'To Do')->count(),
                        Tugas::where('status', 'In Progress')->count(),
                        Tugas::where('status', 'Done')->count(),
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
