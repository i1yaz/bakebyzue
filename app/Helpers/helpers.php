<?php

use App\Models\SiteSetting;

if (! function_exists('cloud_asset')) {
    /**
     * Generate an asset path for the R2 CDN.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function cloud_asset($path, $secure = null)
    {
        $baseUrl = config('filesystems.disks.r2.url');

        if (! $baseUrl) {
            return asset($path, $secure);
        }

        return rtrim($baseUrl, '/').'/'.ltrim($path, '/');
    }
}

if (! function_exists('whatsapp_link')) {
    /**
     * Generate a WhatsApp message link.
     *
     * @return string
     */
    function whatsapp_link(?string $message = null)
    {
        $whatsappNumber = SiteSetting::where('key', 'whatsapp_number')->value('value') ?? '+923461042344';
        $whatsappClean = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $url = "https://wa.me/{$whatsappClean}";

        if ($message) {
            $url .= '?text='.urlencode($message);
        }

        return $url;
    }
}
