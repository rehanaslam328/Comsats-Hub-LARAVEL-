<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicPostComment extends Model
{
    //

    public function acadPosts()
    {
        return $this->belongsTo('App\AcademicPost','acad_id');
    }

    public function usersAcademic()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
