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
    'Name','price','themePath','userId'
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

    //Get Product Sales

    public function sales(){
        return $this->hasMany('App\Sale','productId');
    }

    public function images(){
        return $this->hasMany('App\ProductImage','productId');
    }

    public function discount(){
        return $this->hasOne('App\Discount','product_id');
    }


    public function productFeatures(){
        return $this->belongsToMany('App\Feature','productFeatures');
    }

    public function productCategorys(){
        return $this->belongsToMany('App\Category','productCategorys');
    }


}
