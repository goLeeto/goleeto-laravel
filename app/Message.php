<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'from','to','message','read'
    ];



    protected $table = 'messages';
}
