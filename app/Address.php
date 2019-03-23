<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'city', 'street', 'number', 'bus_number','postal_code','country'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
