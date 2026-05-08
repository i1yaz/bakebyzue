<?php
namespace App\Filament\Resources\Portfolios\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class PortfoliosTable {
    public static function configure(Table $table): Table {
        return $table->columns([
            SpatieMediaLibraryImageColumn::make('images')->collection('images'),
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('event_type'),
            ToggleColumn::make('featured'),
        ])->filters([])->actions([EditAction::make(), DeleteAction::make()]);
    }
}