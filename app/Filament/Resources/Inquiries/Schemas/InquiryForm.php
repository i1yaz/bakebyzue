<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('email')->email(),
            TextInput::make('phone'),
            DatePicker::make('event_date'),
            TextInput::make('product_interest'),
            SpatieMediaLibraryFileUpload::make('picture')
                ->collection('picture')
                ->conversion('webp')
                ->image()
                ->maxSize(10240),
            Textarea::make('message')->required(),
            Select::make('status')->options([
                'pending' => 'Pending',
                'reviewed' => 'Reviewed',
                'completed' => 'Completed',
            ])->default('pending'),
            Textarea::make('notes'),
        ]);
    }
}
