<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Profile extends Model
{
    protected $table = 'user_profiles';
    public $timestamps = false; 

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
