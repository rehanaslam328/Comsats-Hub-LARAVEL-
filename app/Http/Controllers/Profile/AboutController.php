<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Profile;
class AboutController extends Controller
{
    //
    public  function profileAbout(){
        $profiles=Profile::orderBy('id', 'DESC')->first();
           $user_id=Auth::id();

            $user=User::find($user_id);
            $user_department= $user->department->name;

            return view('front-view.profile.About',compact('user','user_department','profiles'));
    }
    public function editProfile(){
        return "edit profile";

    }
}
