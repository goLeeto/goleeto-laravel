<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','Name'
    ];

    protected $table = 'userTypes';
}
