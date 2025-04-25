<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyekResource\Pages;
use App\Filament\Resources\ProyekResource\RelationManagers;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use App\Models\Proyek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProyekResource extends Resource
{
    protected static ?string $model = Proyek::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_proyek')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'On Progress' => 'On Progress',
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_proyek'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('tanggal_mulai'),
                Tables\Columns\TextColumn::make('tanggal_selesai'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProyeks::route('/'),
            'create' => Pages\CreateProyek::route('/create'),
            'edit' => Pages\EditProyek::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            \App\Filament\Resources\ProyekResource\Widgets\Summary::class,
        ];
    }
}
