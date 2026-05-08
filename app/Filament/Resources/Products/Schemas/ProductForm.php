<?php
namespace App\Filament\Resources\Products\Schemas;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;

class ProductForm {
    public static function configure(Schema $schema): Schema {
        return $schema->components([
            Select::make('category_id')->relationship('category', 'name')->required(),
            TextInput::make('title')->required(),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Textarea::make('short_description'),
            Textarea::make('full_description'),
            TextInput::make('price_text'),
            TagsInput::make('flavor_tags'),
            SpatieMediaLibraryFileUpload::make('featured_image')->collection('featured_image'),
            SpatieMediaLibraryFileUpload::make('gallery_images')->collection('gallery_images')->multiple(),
            Toggle::make('is_featured'),
            Toggle::make('is_signature'),
            TextInput::make('sort_order')->numeric()->default(0),
            TextInput::make('seo_title'),
            Textarea::make('seo_description'),
        ]);
    }
}