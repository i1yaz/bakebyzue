<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog';

    protected string $view = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->components([
                TextInput::make('hero_title')->label('Hero Title'),
                Textarea::make('hero_subtitle')->label('Hero Subtitle'),
                TextInput::make('whatsapp_number')->label('WhatsApp Number'),
                TextInput::make('instagram_link')->label('Instagram Link'),

                Textarea::make('inquiry_email_greeting')
                    ->label('Inquiry Email Greeting')
                    ->placeholder("We've received your sweet inquiry! Our artisans are already dreaming up ways to make your celebration truly unforgettable.")
                    ->rows(3),
                TextInput::make('inquiry_email_brand_title')
                    ->label('Inquiry Email Brand Title')
                    ->placeholder('The Art of Handcrafting'),
                Textarea::make('inquiry_email_brand_body')
                    ->label('Inquiry Email Brand Body')
                    ->placeholder('Each creation at ZUE is a bespoke masterpiece...')
                    ->rows(4),
                Textarea::make('inquiry_email_closing_note')
                    ->label('Inquiry Email Closing Note')
                    ->placeholder('Our team will review your request and get back to you within 24-48 business hours...')
                    ->rows(2),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        foreach ($this->form->getState() as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Notification::make()->title('Saved successfully')->success()->send();
    }
}
