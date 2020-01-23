<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\GeneralPost;
use App\GeneralPostComment;
use App\User;
use App\Ad;
use Auth;

class ProfileController extends Controller
{


    public function index(){

          $profiles=Profile::orderBy('id', 'DESC')->first();
        $generalposts=GeneralPost::orderBy('id', 'DESC')->get();
        $comments=GeneralPostComment::all();
        $users=User::all();
        return view('front-view.profile.profile',compact('profiles','generalposts','comments','users'));
    }
  public function profileAds(){
      $ads=Ad::orderBy('id', 'DESC')->get();
      $profiles=Profile::orderBy('id', 'DESC')->first();

      return view('front-view.profile.ads',compact('ads','profiles'));
  }
    public function uploadProfilePhoto(){

        return view('front-view.profile.createprofilephoto');
    }


    public function uploadProfilePhotoSave(Request $request)
    {

         $profile = new Profile();



        if ($request->hasFile('file')) {
             $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/profilephotos', $filename);
            $profile->profilephoto = $filename;


        }

       $id = Auth::id();
        $profile->user_id=$id;
        $profile->save();

    return redirect('index/profile');
    }
}
