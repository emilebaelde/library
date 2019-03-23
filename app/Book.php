<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title','author_id','isbn','year','edition','description', 'photo_id'
    ];


    public function author(){
        return $this->belongsTo('App\Author');
    }
    public function photo(){
    return $this->belongsTo('App\Photo');
}
    public function stock(){
        return $this->hasMany('App\Stock');
    }
}
