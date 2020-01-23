<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPost extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function generalComments()
    {
        return $this->hasMany('App\GeneralPostComment');
    }
}
