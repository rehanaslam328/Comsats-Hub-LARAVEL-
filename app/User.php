<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends Authenticatable
{
    //
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','day','month','year','optradio','city','country','dept_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


// one to many relationship with ad
    public function ads()
    {
        return $this->hasMany('App\Ad');
    }
    public function acadpost()
    {
        return $this->hasMany('App\AcademicPost');
    }
    public function generalpost()
    {
        return $this->hasMany('App\GeneralPost');
    }

    public function department(){
        return $this->belongsTo('App\Department','dept_id');
    }

    public function acadComments()
    {
        return $this->hasMany('App\AcademicPostComment');
    }
public function genComments()
    {
        return $this->hasMany('App\GeneralPostComment');
    }

    public function profiles(){
        return $this->hasOne('App\Profile');
    }

}



