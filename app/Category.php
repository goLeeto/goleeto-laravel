<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'productId','categoryId'
    ];




    protected $table = 'categorys';
}
