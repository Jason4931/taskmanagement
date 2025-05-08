<?php

namespace App\Filament\Resources\TugasResource\Widgets;

use Filament\Tables;
use App\Models\Tugas;
use Filament\Tables\Table;
use Filament\Tables\Columns\SelectColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Forms;
use App\Filament\Resources\TugasResource;

class TugasAddon extends BaseWidget
{
    protected $listeners = ['statusChange' => '$refresh'];
    public function table(Table $table): Table
    {
        return $table
            ->heading(null)
            ->query(
                Tugas::where('status', '=', 'In Progress')
            )
            ->columns([
                Tables\Columns\TextColumn::make('nama_tugas'),
                Tables\Columns\TextColumn::make('proyek.nama_proyek'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('deskripsi'),
                // Tables\Columns\TextColumn::make('status'),
                SelectColumn::make('status')
                    ->options([
                        'To Do' => 'To Do',
                        'In Progress' => 'In Progress',
                        'Done' => 'Done',
                    ])
                    ->afterStateUpdated(function ($livewire) {
                        $livewire->dispatch('statusChange');
                    }),
                Tables\Columns\TextColumn::make('tanggal_mulai'),
                Tables\Columns\TextColumn::make('tanggal_selesai'),
            ])
            ->actions([
                Tables\Actions\Action::make('Done')
                    ->button()
                    ->action(function (Tugas $record, $livewire) {
                        $record->update(['status' => 'Done']);
                        $livewire->dispatch('statusChange');
                    }),
                Tables\Actions\ViewAction::make()
                    ->url(fn($record): string => TugasResource::getUrl('view', ['record' => $record])),
                Tables\Actions\EditAction::make()
                    ->url(fn($record): string => TugasResource::getUrl('edit', ['record' => $record])),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
