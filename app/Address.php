<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Country','City','Street','Zip'
    ];




    protected $table = 'address';

   
    
}
