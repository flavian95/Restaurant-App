<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'isActive'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items', 'item_id', 'order_id')
                    ->withPivot('quantity');
    }
}