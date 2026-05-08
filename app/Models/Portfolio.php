<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model implements \Spatie\MediaLibrary\HasMedia
{
    use \Spatie\MediaLibrary\InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
