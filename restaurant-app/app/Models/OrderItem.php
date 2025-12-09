<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    protected $table = 'order_items';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'item_id',
        'quantity'
    ];

    public $incrementing = false;
}