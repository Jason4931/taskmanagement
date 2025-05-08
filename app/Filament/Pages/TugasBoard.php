<?php

namespace App\Filament\Pages;

use Mokhosh\FilamentKanban\Pages\KanbanBoard;
use App\Models\Tugas;
use Illuminate\Support\Collection;
use Filament\Forms;

class TugasBoard extends KanbanBoard
{
    protected static string $model = Tugas::class;
    protected static string $statusEnum = Tugas::class;
    protected static string $recordTitleAttribute = 'nama_tugas';

    protected function records(): Collection
    {
        return Tugas::all();
    }

    protected function statuses(): Collection
    {
        return collect([
            ['id' => 'To Do', 'title' => 'To Do'],
            ['id' => 'In Progress', 'title' => 'In Progress'],
            ['id' => 'Done', 'title' => 'Done'],
        ]);
    }

    protected function getEditModalFormSchema(string|int|null $recordId): array
    {
        return [
            Forms\Components\TextInput::make('nama_tugas')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('proyek_id')
                ->relationship('proyek', 'nama_proyek')
                ->required(),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'To Do' => 'To Do',
                    'In Progress' => 'In Progress',
                    'Done' => 'Done',
                ])
                ->required(),
            Forms\Components\Textarea::make('deskripsi')
                ->required()
                ->maxLength(65535)
                ->columnSpanFull(),
            Forms\Components\DatePicker::make('tanggal_mulai')
                ->required(),
            Forms\Components\DatePicker::make('tanggal_selesai')
                ->required(),
        ];
    }
}
