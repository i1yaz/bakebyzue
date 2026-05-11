<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('product_id')
                ->relationship('product', 'title')
                ->searchable()
                ->preload()
                ->helperText('Select a product to link this testimonial to. Leave empty for a general review.'),
            TextInput::make('customer_name')->required(),
            Textarea::make('review')->required(),
            TextInput::make('rating')->numeric()->default(5),
            SpatieMediaLibraryFileUpload::make('customer_image')->collection('customer_image')->columnSpanFull(),
            Toggle::make('featured'),
        ]);
    }
}
