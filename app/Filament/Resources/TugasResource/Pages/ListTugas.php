<?php

namespace App\Filament\Resources\TugasResource\Pages;

use App\Filament\Resources\TugasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTugas extends ListRecords
{
    protected $listeners = ['statusChange' => '$refresh'];
    protected static string $resource = TugasResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            TugasResource\Widgets\CountTugas::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            TugasResource\Widgets\TugasAddon::class,
            TugasResource\Widgets\TugasAddon2::class,
        ];
    }
    public function getFooterWidgetsColumns(): string|int|array
    {
        return 1;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
