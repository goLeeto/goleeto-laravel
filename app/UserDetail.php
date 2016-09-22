<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','birthdate','UserId'
    ];
    protected $table = 'userDetails';
    
}
