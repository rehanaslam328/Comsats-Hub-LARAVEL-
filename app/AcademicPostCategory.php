<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicPostCategory extends Model
{
    //
    protected $fillable = [
        'type'
    ];

    public function academicPosts()
    {
        return $this->hasMany('App\AcademicPost');
    }
}
