<?php
namespace App\Filament\Resources\Inquiries\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class InquiriesTable {
    public static function configure(Table $table): Table {
        return $table->columns([
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