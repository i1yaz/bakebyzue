<?php

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

        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }
}
