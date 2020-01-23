<?php

namespace App\Http\Controllers\GeneralPost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\GeneralPost;
use Illuminate\Support\Facades\Storage;
use App\GeneralPostCategory;
use App\GeneralPostComment;
use App\User;
use App\Profile;
Use App\Role;
class GeneralPostController extends Controller
{
    //
    public function create(){
        $genPostsCategory=GeneralPostCategory::all();
        return view('front-view.generalposts.create',compact('genPostsCategory'));


    }
     public function index(){
           $genposts=GeneralPost::orderBy('id', 'DESC')->get();
         $comments=GeneralPostComment::all();
         $users=User::all();
         $genPostsCategory=GeneralPostCategory::all();

          $profiles=Profile::orderBy('id', 'DESC')->first();
         $roles=Role::all();
         return view('front-view.generalposts.newsfeed',compact('genposts','roles','comments','users', 'genPostsCategory','profiles'));

     }


     public  function store(Request $request){

         $generalPost=new GeneralPost();
         $generalPost->post=$request->title;
          $stat=$request->status;
         $generalPost->status=$stat;

           if($request->hasFile('file')){
             $filename=$request->file->getClientOriginalName();
             $request->file->storeAs('public/generalposts',$filename);
             $generalPost->filetype=$request->file->getClientOriginalExtension();
             $generalPost->file=$filename;

         }else{
               $filename=$request->video->getClientOriginalName();
               $generalPost->filetype=$request->video->getClientOriginalExtension();
               $request->video->storeAs('public/generalposts',$filename);
               $generalPost->file=$filename;
           }



         $generalPost->gen_post_category_id=  $request->gencategory;
         // Get the currently authenticated user's ID...
         $id = Auth::id();
         $generalPost->user_id=$id;

         $generalPost->save();
         if($generalPost){

             return redirect('/index')->with('apostsuccess', 'Successfully Posted!');

         }

     }

     public function  show($id){
          $post=GeneralPost::find($id);
          $users=User::all();
         $comments=GeneralPostComment::all();
         $id=Auth::id();
         $profiles=Profile::orderBy('id', 'DESC')->where('user_id','=',$id)->first();
         return view('front-view.generalposts.show',compact('post','users','comments','profiles'));
     }

     public function edit($id){
         $post=GeneralPost::find($id);
         $genPostsCategory=GeneralPostCategory::all();
         return view('front-view.generalposts.edit',compact('post','genPostsCategory'));
     }

    public  function update(Request $request){

        $generalPost=GeneralPost::find($request->id);
        $storagePath= $generalPost->file;
        Storage::delete('public/generalposts/'.$storagePath);
        $generalPost->post=$request->title;
        $stat='public';
        $generalPost->status=$stat;
        if($request->hasFile('video')){
            $filename=$request->video->getClientOriginalName();
            $request->video->storeAs('public/generalposts',$filename);
            $generalPost->filetype=$request->video->getClientOriginalExtension();
            $generalPost->file=$filename;

        }
        else  if($request->hasFile('file')){
            $filename=$request->file->getClientOriginalName();
            $request->file->storeAs('public/generalposts',$filename);
            $generalPost->filetype=$request->file->getClientOriginalExtension();
            $generalPost->file=$filename;

        }



        $generalPost->gen_post_category_id=  $request->gencategory;
        // Get the currently authenticated user's ID...
        $id = Auth::id();
        $generalPost->user_id=$id;

        $generalPost->save();
        if($generalPost){

            return redirect('/index')->with('apostsuccess', 'Successfully Posted!');

        }
     }

      public function destroy($id){
            $acad= GeneralPost::find($id);
           $storagePath= $acad->file;
          Storage::delete('public/generalposts/'.$storagePath);
          $acad->delete();
          if ($acad) {
              return redirect('/index')->with('deleteAd', 'Ad Successfully Delete!');
          }

      }

     public function storeGeneralComment(Request $request){

         $comment=new GeneralPostComment();
         $comment->comment=$request->comment;
         $comment->general_post_id=$request->postid;
         $id = Auth::id();
         $comment->user_id=$id;
         $comment->save();

         return redirect('/index');

     }

    public  function getImages(){
        $profiles=Profile::orderBy('id', 'DESC')->first();
        $genposts=GeneralPost::orderBy('id', 'DESC')->get();
        $comments=GeneralPostComment::all();
        $users=User::all();

        return view('front-view.image.newsfeed-images',compact('profiles','genposts',
            'comments','users'));
    }
    public function getVideos(){
        $profiles=Profile::orderBy('id', 'DESC')->first();
        $genposts=GeneralPost::orderBy('id', 'DESC')->get();
        $comments=GeneralPostComment::all();
        $users=User::all();

        return view('front-view.newsfeed-videos',compact('profiles','genposts',
            'comments','users'));
    }

    public  function editGeneralComment($id){
        $comment=GeneralPostComment::find($id);
        return view('front-view.generalposts.comments.edit',compact('comment'));
    }
  public function updateGeneralComment(Request $request){

      $editcomment=GeneralPostComment::find($request->id);
      $editcomment->comment=$request->comment;
      $editcomment->general_post_id=$request->postid;
      $id = Auth::id();
      $editcomment->user_id=$id;
      $editcomment->save();
      return redirect('/index');
  }
    public function destroyGeneralComment($id){
        $acad= GeneralPostComment::find($id);

        $acad->delete();
        return redirect('/index');
    }
    public function siteMap(){
        $profiles=Profile::orderBy('id', 'DESC')->first();

        return view('front-view.sitemap',compact('profiles'));
    }




}
