<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','user_id','value'
    ];

    protected $table = 'shopping_cart';



    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
