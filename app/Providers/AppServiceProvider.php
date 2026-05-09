<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['livewire.temporary_file_upload.disk' => 'local']);

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $whatsappNumber = \App\Models\SiteSetting::where('key', 'whatsapp_number')->value('value') ?? '+923461042344';
            $whatsappClean = preg_replace('/[^0-9]/', '', $whatsappNumber);
            $view->with('whatsappLink', "https://wa.me/{$whatsappClean}");
        });
    }
}
