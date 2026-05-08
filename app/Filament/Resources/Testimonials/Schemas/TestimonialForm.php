<?php
namespace App\Filament\Resources\Testimonials\Schemas;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class TestimonialForm {
    public static function configure(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('customer_name')->required(),
            Textarea::make('review')->required(),
            TextInput::make('rating')->numeric()->default(5),
            SpatieMediaLibraryFileUpload::make('customer_image')->collection('customer_image'),
            Toggle::make('featured'),
        ]);
    }
}