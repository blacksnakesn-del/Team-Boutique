<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['code', 'percentage', 'active', 'expires_at'];
    
    protected $casts = [
        'percentage' => 'integer',
        'active' => 'boolean',
        'expires_at' => 'datetime'
    ];

    public function scopeValid($query)
    {
        return $query->where('active', true)->where(function ($q) {
            $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
        });
    }
    
}
