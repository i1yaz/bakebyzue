<?php
namespace App\Filament\Resources\Portfolios\Schemas;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PortfolioForm {
    public static function configure(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('title')->required(),
            TextInput::make('event_type'),
            Textarea::make('description'),
            SpatieMediaLibraryFileUpload::make('images')->collection('images')->multiple(),
            Toggle::make('featured'),
        ]);
    }
}