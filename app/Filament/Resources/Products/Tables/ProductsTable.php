<?php
namespace App\Filament\Resources\Products\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ProductsTable {
    public static function configure(Table $table): Table {
        return $table->columns([
            SpatieMediaLibraryImageColumn::make('featured_image')->collection('featured_image'),
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('category.name'),
            ToggleColumn::make('is_featured'),
            ToggleColumn::make('is_signature'),
        ])->filters([])->actions([EditAction::make(), DeleteAction::make()]);
    }
}