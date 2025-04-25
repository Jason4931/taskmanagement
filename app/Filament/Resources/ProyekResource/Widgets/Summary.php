<?php

namespace App\Filament\Resources\ProyekResource\Widgets;

use App\Models\Tugas;
use Filament\Widgets\Widget;

class Summary extends Widget
{
    // This will be injected by Filament when you call ->make(['proyekId' => ...])
    public ?int $proyekId = null;

    // Must match the view path below (no “.blade.php”)
    protected static string $view = 'filament.resources.proyek-resource.widgets.summary';

    protected int|string|array $columnSpan = 'full';

    // Livewire mount, receives our injected proyekId
    public function mount(int $proyekId): void
    {
        $this->proyekId = $proyekId;
    }

    protected function getViewData(): array
    {
        $counts = Tugas::where('proyek_id', $this->proyekId)
            ->selectRaw('status, COUNT(*) AS count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        return [
            'toDo'       => $counts['To Do']       ?? 0,
            'inProgress' => $counts['In Progress'] ?? 0,
            'done'       => $counts['Done']        ?? 0,
        ];
    }
}
