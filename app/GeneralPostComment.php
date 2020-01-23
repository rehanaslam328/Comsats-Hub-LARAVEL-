<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPostComment extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\user','user_id');
    }
    public function generalPost(){
        return $this->belongsTo('App\GeneralPost','general_post_id');
    }
}
