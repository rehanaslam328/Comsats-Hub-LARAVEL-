<?php

namespace App\Http\Controllers\Ads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Ad;
use App\Profile;
class AdsController extends Controller
{


    public function create(){

        return view('front-view.ads.create');
    }

    public function index(){
           $ads=Ad::orderBy('id', 'DESC')->get();
        $profiles=Profile::orderBy('id', 'DESC')->first();

        return view('front-view.ads.index',compact('ads','profiles'));
    }

    public function store(Request $request){


          $ad=new Ad();
          $ad->name=$request->name;
          $ad->title=$request->title;
          $ad->condition=$request->condition;
          $ad->description=$request->description;
          $ad->price=$request->price;
          $ad->phoneno=$request->phoneno;
          // Saving file
        if($request->hasFile('file')){
              $filename=$request->file->getClientOriginalName();
              $request->file->storeAs('public/ad/',$filename);
              $ad->image=$filename;

        }

        // Get the currently authenticated user's ID...
         $id = Auth::id();
         $ad->user_id=$id;

             $ad->save();
            if ($ad) {
                return redirect('/ads/index')->with('adsuccess', 'Ad Successfully Posted!');
            }

    }

    public function show($id){
          $ad=Ad::find($id);
        $profiles=Profile::orderBy('id', 'DESC')->first();
          return view('front-view.ads.show',compact('ad','profiles'));
    }


    public function edit($id){

           $ad=Ad::find($id);
           return view('front-view.ads.edit',compact('ad'));

    }

    public function update(Request $request){
         $ad= Ad::find($request->id);
        $storagePath= $ad->image;
        Storage::delete('public/ad/'.$storagePath);

        $ad->name=$request->name;
        $ad->title=$request->title;
        $ad->condition=$request->condition;
        $ad->description=$request->description;
        $ad->price=$request->price;
        $ad->phoneno=$request->phoneno;
        // Saving file
        if($request->hasFile('file')){
            $filename=$request->file->getClientOriginalName();
            $request->file->storeAs('public/ad/',$filename);
            $ad->image=$filename;

        }

        // Get the currently authenticated user's ID...
        $id = Auth::id();
        $ad->user_id=$id;

        $ad->save();
        if ($ad) {
            return redirect('/ads/index')->with('updateAd', 'Ad Successfully Updated!');
        }
    }



    public function destroy($id){

          $ad= Ad::find($id);
          $storagePath= $ad->image;
          Storage::delete('public/ad/'.$storagePath);
        $ad->delete();
        if ($ad) {
            return redirect('/ads/index')->with('deleteAd', 'Ad Successfully Delete!');
        }
    }


}
