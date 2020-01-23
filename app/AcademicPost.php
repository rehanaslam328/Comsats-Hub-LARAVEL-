<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicPost extends Model
{
    //
    public function userss()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function acadPostCategory()
    {
        return $this->belongsTo('App\AcademicPostCategory');
    }
    public function academicComments()
    {
        return $this->hasMany('App\AcademicPostComment');
    }

}
