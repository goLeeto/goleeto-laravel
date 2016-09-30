<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productDetail extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','Description','Rating','ratingNo','path'
    ];



    protected $table = 'productDetails';
}
