<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 
                           'category_id', 
                           'price', 
                           'sale_price', 
                           'stock', 
                           'version', 
                           'unit', 
                           'origin',
                           'description',
                           'image',
                           'active',
                           'featured'
                        ];
    protected $casts = [
        'price' => 'integer',
        'sale_price' => 'integer',
        'stock' => 'integer',
        'active' => 'boolean',
        'featured' => 'boolean'
    ];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function scopeActive($query) {
        return $query->where('actvve', true);
    }

    public function scopeFeatured($query) {
        return $query->where('featured', true);
    }
}
