<?php

namespace App\Filament\Resources\ProyekResource\Pages;

use App\Filament\Resources\ProyekResource\Widgets\Summary;
use App\Filament\Resources\ProyekResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProyek extends EditRecord
{
    protected static string $resource = ProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            Summary::make(['proyekId' => $this->record->id]),
        ];
    }
}
