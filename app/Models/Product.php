<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function toCatalogArray()
    {
        return [
            'id' => $this->id,
            'categoryId' => $this->categorie_id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'origin' => $this->description,
            'image' => $this->image,
        ];
    }

}
