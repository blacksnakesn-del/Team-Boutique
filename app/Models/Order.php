<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'reference',
        'checkout_token',
        'delivery_zone_id',
        'customer_full_name',
        'customer_phone',
        'zone_name',
        'address',
        'fulfillment_mode',
        'note',
        'sub_total',
        'discount_percentage',
        'discount_amount',
        'total',
        'status',
        'stock_applied',
        'stock_restored',
        'canceled_at'
    ];

    protected $casts = [
        'sub_total' => 'integer',
        'discount_percentage' => 'integer',
        'discount_amount' => 'integer',
        'total' => 'integer',
        'stock_applied' => 'boolean',
        'stock_restored' => 'boolean',
        'canceled_at' => 'datetime'
    ];

    public function deliveryZone()
    {
        return $this->belongsTo(DeliveryZone::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
