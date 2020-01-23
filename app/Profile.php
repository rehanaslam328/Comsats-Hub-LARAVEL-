<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $table='profilesphoto';
    //
    public function profileUser(){
        return $this->belongsTo('App\User','user_id');
    }

}
