<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'hero_title' => 'Handcrafted with Love.',
            'hero_subtitle' => "Experience the warmth of artisanal baking, where every creation is a delicate masterpiece designed to celebrate life's sweetest moments.",
            'whatsapp_number' => '+92 346 1042344',
            'instagram_link' => 'https://www.instagram.com/bakebyzue',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
