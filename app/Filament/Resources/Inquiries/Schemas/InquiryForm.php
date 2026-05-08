<?php
namespace App\Filament\Resources\Inquiries\Schemas;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

class InquiryForm {
    public static function configure(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('phone'),
            DatePicker::make('event_date'),
            TextInput::make('product_interest'),
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