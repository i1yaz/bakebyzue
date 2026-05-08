<?php
namespace App\Filament\Resources\Testimonials\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class TestimonialsTable {
    public static function configure(Table $table): Table {
        return $table->columns([
            SpatieMediaLibraryImageColumn::make('customer_image')->collection('customer_image'),
            TextColumn::make('customer_name')->searchable()->sortable(),
            TextColumn::make('rating'),
            ToggleColumn::make('featured'),
        ])->filters([])->actions([EditAction::make(), DeleteAction::make()]);
    }
}