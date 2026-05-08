<?php
namespace App\Filament\Resources\Categories\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class CategoriesTable {
    public static function configure(Table $table): Table {
        return $table->columns([
            SpatieMediaLibraryImageColumn::make('image')->collection('image'),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('slug'),
            TextColumn::make('sort_order')->sortable(),
            ToggleColumn::make('is_active'),
        ])->filters([])->actions([EditAction::make(), DeleteAction::make()]);
    }
}