<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','password','first_name','last_name', 'email','nin','role_id','address_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function rental(){
        return $this->hasMany('App\Rental');
    }
    public function address(){
        return $this->belongsTo('App\Address');
    }
    public function isAdmin(){
        if($this->role->name == 'administrator' && $this->is_active == 1){
            return true;
        }else{
            return false;
        }
    }
}
