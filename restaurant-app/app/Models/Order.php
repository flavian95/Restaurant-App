<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'order_type',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'order_items', 'order_id', 'item_id')
                    ->withPivot('quantity');
    }

    public function getTotalPriceAttribute()
{
    return $this->items->sum(function ($item) {
        return $item->price * $item->pivot->quantity;
    });
}
}