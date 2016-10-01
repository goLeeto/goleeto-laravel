<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productId','path'
    ];


    protected $table = 'productImages';

}
