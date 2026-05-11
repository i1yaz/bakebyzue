<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            SpatieMediaLibraryImageColumn::make('customer_image')->collection('customer_image'),
            TextColumn::make('customer_name')->searchable()->sortable(),
            TextColumn::make('product.title')
                ->label('Linked Product')
                ->placeholder('General')
                ->searchable(),
            TextColumn::make('rating'),
            ToggleColumn::make('featured'),
        ])->filters([])->recordActions([EditAction::make(), DeleteAction::make()]);
    }
}
