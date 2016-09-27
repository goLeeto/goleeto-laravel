<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FirstName','LastName','UserName','UserType','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Get User Details

    public function details(){
        return $this->hasOne('App\UserDetail','UserId');
    }

    //Get User Products

    public function products(){
        return $this->hasMany('App\Product','userId');
    }

    //Get User Sales

    public function sales(){
    return $this->hasMany('App\Sale','userId');
}


}
