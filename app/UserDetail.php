<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','birthdate','UserId','address'
    ];
    protected $table = 'userDetails';
    
    public function addr(){
        return $this->belongsTo('\App\Address','address');
    }

}
