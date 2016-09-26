<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
    ];




    protected $table = 'products';

    //Get Product Details

    public function details(){
        return $this->hasOne('App\ProductDetail','id');
    }

    //Get Product Comments

    public function comments(){
        return $this->hasMany('App\ProductComment','productId');
    }

}
