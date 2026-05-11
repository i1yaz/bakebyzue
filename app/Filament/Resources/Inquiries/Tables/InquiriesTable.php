<?php

namespace App\Filament\Resources\Inquiries\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            SpatieMediaLibraryImageColumn::make('picture')
                ->collection('picture')
                ->conversion('webp')
                ->circular(),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('phone'),
            TextColumn::make('event_date')->date(),
            SelectColumn::make('status')->options([
                'pending' => 'Pending',
                'reviewed' => 'Reviewed',
                'completed' => 'Completed',
            ]),
        ])->filters([])->actions([EditAction::make(), DeleteAction::make()]);
    }
}
