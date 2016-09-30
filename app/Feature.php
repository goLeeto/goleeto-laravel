<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'productId','featureId'
    ];



    protected $table = 'features';
}
