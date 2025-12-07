<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    public $timestamps = false; 

    protected $fillable = [
        'email',
        'password_hash',
    ];

    protected $hidden = [
        'password_hash'
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function profile()
    {
        return $this->hasOne(User_Profile::class, 'user_id');
    }

    public function orders()
{
    return $this->hasMany(Order::class, 'user_id');
}

}