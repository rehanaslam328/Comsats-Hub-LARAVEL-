<?php

namespace App\Http\Controllers\AcademicPosts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AcademicPost;
use Illuminate\Support\Facades\Storage;
use App\AcademicPostCategory;
use App\AcademicPostComment;
use App\User;
use App\Profile;
class AcademicPostController extends Controller
{
    //
    public function create(){
         $acadPostsCategory=AcademicPostCategory::all();
        return view('front-view.academicposts.create',compact('acadPostsCategory'));


    }
    public function index(){
        $academicposts=AcademicPost::orderBy('id', 'DESC')->get();
        $comments=AcademicPostComment::all();
        $users=User::all();
        $acadPostsCategory=AcademicPostCategory::all();
              $id=Auth::id();
        $profiles=Profile::orderBy('id', 'DESC')->where('user_id','=',$id)->first();

        return view('front-view.academicposts.index',compact('academicposts','comments','users',
            'acadPostsCategory','profiles'));

    }
    public function search(Request $request){


        $q=$request->search;
        return $user = AcademicPost::where('title','LIKE',$q.'%')->get();
    }
    public function store(Request $request){

        $academicPost=new AcademicPost();
        $academicPost->title=$request->title;

        // Saving file
        if($request->hasFile('file')){
            $filename=$request->file->getClientOriginalName();
            $request->file->storeAs('public/Academicposts',$filename);
            $academicPost->filetype=$request->file->getClientOriginalExtension();
            $academicPost->image=$filename;

        } else if($request->hasFile('pdf')){
             $filename=$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/Academicposts',$filename);
            $academicPost->filetype=$request->pdf->getClientOriginalExtension();
            $academicPost->image=$filename;

        } else  if($request->hasFile('word')){
            $filename=$request->word->getClientOriginalName();
            $request->word->storeAs('public/Academicposts',$filename);
            $academicPost->filetype=$request->word->getClientOriginalExtension();

            $academicPost->image=$filename;

        }
        $academicPost->acad_category_id=  $request->acadcategory;
        // Get the currently authenticated user's ID...
        $id = Auth::id();
        $academicPost->user_id=$id;

        $academicPost->save();
        if($academicPost){

            return redirect('/AcadPost/index')->with('apostsuccess', 'Successfully Posted!');

        }


    }

    public  function download($id){
         $path= AcademicPost::find($id)->image;
       return response()->download(storage_path('app/public/Academicposts/'.$path));
    }

    public  function show($id){
           $post=  AcademicPost::find($id);

           return  view('front-view.academicposts.show',compact('post'));

    }


    public function  edit($id){
           $post=AcademicPost::find($id);
        $acadPostsCategory=AcademicPostCategory::all();
          return view('front-view.academicposts.edit',compact('post','acadPostsCategory'));

          }
        public function update(Request $request){

            $academicPost = AcademicPost::find($request->id);

            $storagePath= $academicPost->image;
            Storage::delete('public/Academicposts/'.$storagePath);
            $academicPost->title=$request->title;

            // Saving file
            if($request->hasFile('file')){
                $filename=$request->file->getClientOriginalName();
                $request->file->storeAs('public/Academicposts',$filename);
                $academicPost->filetype=$request->file->getClientOriginalExtension();
                $academicPost->image=$filename;

            } else if($request->hasFile('pdf')){
                $filename=$request->pdf->getClientOriginalName();
                $request->pdf->storeAs('public/Academicposts',$filename);
                $academicPost->filetype=$request->pdf->getClientOriginalExtension();
                $academicPost->image=$filename;

            } else  if($request->hasFile('word')){
                $filename=$request->word->getClientOriginalName();
                $request->word->storeAs('public/Academicposts',$filename);
                $academicPost->filetype=$request->word->getClientOriginalExtension();

                $academicPost->image=$filename;

            }
            $academicPost->acad_category_id=  $request->acadcategory;
            // Get the currently authenticated user's ID...
            $id = Auth::id();
            $academicPost->user_id=$id;

            $academicPost->save();
            if($academicPost){

                return redirect('/AcadPost/index')->with('apostsuccess', 'Successfully Posted!');

            }

        }







    public function  destroy($id){
        $acad= AcademicPost::find($id);
        $storagePath= $acad->image;
        Storage::delete('public/Academicposts/'.$storagePath);
        $acad->delete();
        if ($acad) {
            return redirect('/AcadPost/index')->with('deleteAd', 'Ad Successfully Delete!');
        }

    }





    public function storeComment(Request $request){

        $comment=new AcademicPostComment();
        $comment->comment=$request->comment;
        $comment->acad_id=$request->postid;
        $id = Auth::id();
        $comment->user_id=$id;
        $comment->save();

        return redirect('/AcadPost/index');
    }
    public  function editComment($id){
         $comment=AcademicPostComment::find($id);
         return view('front-view.academicposts.comments.edit',compact('comment'));
    }
   public  function updateComment(Request $request){
            $editcomment=AcademicPostComment::find($request->id);
       $editcomment->comment=$request->comment;
       $editcomment->acad_id=$request->postid;
       $id = Auth::id();
       $editcomment->user_id=$id;
       $editcomment->save();
       return redirect('/AcadPost/index');
   }
   public function destroyComment($id){
       $acad= AcademicPostComment::find($id);

       $acad->delete();
       return redirect('/AcadPost/index');
   }


}
