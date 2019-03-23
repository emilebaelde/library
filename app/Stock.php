<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'book_id','barcode','available'
    ];

    public function rental(){
        return $this->hasMany('App\Rental');
    }
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
