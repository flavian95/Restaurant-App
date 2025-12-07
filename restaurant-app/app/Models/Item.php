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

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class, 'item_id');
    // }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items', 'item_id', 'order_id')
                    // ->using(OrderItem::class)
                    ->withPivot('quantity');
    }
}