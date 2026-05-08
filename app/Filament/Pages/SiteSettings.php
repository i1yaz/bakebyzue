<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

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