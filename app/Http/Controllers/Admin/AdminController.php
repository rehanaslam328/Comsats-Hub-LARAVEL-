<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Ad;
use App\User;
use App\AcademicPost;
use App\GeneralPost;
class AdminController extends Controller
{

  public function index(){
        $adCount=Ad::all()->count();
        $users=User::all();
        $userCount=User::all()->count();
        $academicPostCount=AcademicPost::all()->count();
        $generalPostCount=GeneralPost::all()->count();
      return view('admin-view.index',compact('adCount',
          'users','userCount','academicPostCount','generalPostCount'));
  }
  public function ads(){
      $ads=Ad::orderBy('id', 'DESC')->get();

      return view('admin-view.ads.index',compact('ads','user'));
  }
  public function  academicpost(){
      $ads=AcademicPost::orderBy('id', 'DESC')->get();

      return view('admin-view.academicpost.index',compact('ads'));

  }
  public function generalpost(){
      $ads=GeneralPost::orderBy('id', 'DESC')->get();

      return view('admin-view.generalpost.index',compact('ads'));

  }
  public function deleteAcademicPost($id){
      $acad= AcademicPost::find($id);
      $storagePath= $acad->image;
      Storage::delete('public/Academicposts/'.$storagePath);
      $acad->delete();
      if ($acad) {
          return redirect('/admin/acadpost')->with('deleteAd', 'Ad Successfully Delete!');
      }

  }

}
