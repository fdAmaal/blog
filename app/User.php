<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
//when you have this, the model makes a hash to all password inputs passed in user model

// i used this method to solve the error .. but it dosnt
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country', 'img', 'ip_address', 'is_admin', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
