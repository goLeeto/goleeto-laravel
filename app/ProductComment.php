<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productComment extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'userId','productId','comment'
    ];




    protected $table = 'productComments';


    public function user(){
    	return $this->belongsTo('App\User','userId');
    }
}
