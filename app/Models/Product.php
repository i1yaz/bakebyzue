<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model implements \Spatie\MediaLibrary\HasMedia
{
    use \Spatie\MediaLibrary\InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'flavor_tags' => 'array',
        'is_featured' => 'boolean',
        'is_signature' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
