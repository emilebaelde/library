<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id','stock_id','rental_start', 'rental_end','rental_back'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function stock(){
        return $this->belongsTo('App\Stock');
    }

}
