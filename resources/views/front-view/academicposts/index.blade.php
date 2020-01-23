@extends('front-view.master.front-master')
@section('left-profile')
    <div class="profile-card">

            @if(Auth::user()->id==$profiles->user_id)
            <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="img-responsive profile-photo" />
            <h5><a href="{{url('/index/profile')}}" class="text-white ">{{ucfirst(Auth::user()->firstname)}}</a></h5>
          @endif
        {{--<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>--}}

    </div>
@endsection
@section('front-master')

    <!-- Post Create Box
            ================================================= -->
    <div class="col-md-7 create-post-top">
      <!-- Post Create Box End-->
        <div class="create-post">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="row">
                        <div class="col-md-3">
                            @if(Auth::user()->id == $profiles->user_id)
                                <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="img-responsive profile-photo" />
                            @endif
                        </div>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary add-general-post " data-toggle="modal" data-target="#myModal">
                                Add Academic Post
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">General Post</h4>
                                </div>
                                <form  action="{{route('acadsave')}}" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <input name="title" type="text"   class="form-control" placeholder="Write what you wish" required>
                                        <label class="checkbox-inline"><input type="checkbox"  id="pdf" >PDF</label>
                                        <label class="checkbox-inline"><input type="checkbox"  id="word">WORD</label>
                                        <label class="checkbox-inline"><input type="checkbox"  id="file">IMAGE</label>
                                        <br><label for="" style="display: none" class="pdf">Select Pdf</label>
                                        <input style="display: none"  type="file"  name="pdf"  class="form-control pdf" >
                                        <label for="" style="display: none" class="word">Select word</label>
                                        <input style="display: none"   type="file" name="word"  class="form-control word" >
                                        <label for="" style="display: none" class="file">Select Image</label>
                                        <input style="display: none"  type="file" name="file"  class="form-control file" ><br>
                                        <label for="sel1">Select Category:</label><br>
                                        <select class="form-control" name="acadcategory" id="sel1">
                                            @foreach($acadPostsCategory as $acadPost)
                                                <option value="{{$acadPost->id}}">{{$acadPost->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="Submit" class="btn btn-primary" >Publish</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>







                </div>
            </div>
        </div>
        <!-- Post Content
        ================================================= -->
        @if (session('apostsuccess'))
            <div class="alert alert-success alert-dismissible">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{session('apostsuccess')}}</p>

            </div>
        @endif
        <div>
            <h1>Academic Posts</h1>
        </div>
        <hr>
        @foreach($academicposts as $academicpost)

        <div class="post-content">
            <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="user" class="profile-photo-md pull-left post-profile-pic" />

            <div class="user-info">
                @foreach($users as $user)
                @if($user->id == $academicpost->user_id)
                    <h5><a href="timeline.html" class="profile-link profile-name">{{ ucfirst($user->firstname) }}&nbsp;{{ ucfirst($user->lastname) }}</a></h5>
                @endif
                @endforeach
                <p class="text-muted profile-name">Published a photo about {{$academicpost->created_at->diffForHumans()}}</p>
            </div>
            {{--<div class="reaction">--}}
            {{--<a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>--}}

            {{--</div>--}}
            <div class="line-divider"></div>
            <div class="post-text">
                <p id="academicposttitle">{{$academicpost->title}}</p>
            </div>
            <div class="line-divider"></div>

        @if($academicpost->filetype=='jpg')
            <img src="{{asset('storage/Academicposts/'.$academicpost->image)}}" alt="post-image" class="img-responsive post-image" />
                @elseif($academicpost->filetype=='pdf')
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-1">
                          <img src="{{asset('images/pdf-icon.png')}}" alt="no icon" height="35px">

                          </div>
                          <div class="col-md-5">
                              <a href="{{url('/Acadpost/pdf-downlaod/'.$academicpost->id)}}">     <p >{{$academicpost->image}}</p>
                              </a>
                          </div>
                      </div>
                  </div>
                  @elseif($academicpost->filetype=='docx')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="{{asset('images/word-icon.png')}}" alt="no icon" height="35px">

                        </div>
                        <div class="col-md-5">
                            <a href="{{url('/Acadpost/word-downlaod/'.$academicpost->id)}}">     <p >{{$academicpost->image}}</p>
                            </a>
                        </div>
                    </div>
                </div>
              @endif

            <div class="container-fluid">

              <div class="row pull-right">
                  <div class="col-md-3">
                      <a href="{{url('AcadPost/show/'.$academicpost->id)}}" class="view text-success ">Show</a>
                  </div>
                  @if(Auth::user()->id == $academicpost->user_id)
                  <div class="col-md-3">
                      <a href="{{url('AcadPost/edit/'.$academicpost->id)}}" class="view text-primary ">Edit</a>
                  </div>
                  <div class="col-md-3">
                      <a href="{{url('AcadPost/delete/'.$academicpost->id)}}" class="view text-danger">Delete</a>
                  </div>

                  @endif
              </div>
                <div class="line-divider"></div>
            </div>

                <div class="post-container">

                    <button  class="btn btn-info"  data-toggle="collapse" data-target="#academiccomments" >Comments</button>
                    <div class="post-detail collapse"  id="academiccomments">
                        <div class="line-divider " ></div>
                        @foreach($comments as $comment)
                            <div class="post-comment  " >
                                @if($comment->acad_id==$academicpost->id )
                                    @foreach($users as $user)


                                       @if($user->id == $profiles->user_id)


                                           <div class="row">
                                                <div class="col-md-3">

                                                    <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="profile-photo-sm" />
                                                </div>
                                           </div>


                                        @endif


                                        @if($user->id==$comment->user_id)

                                          <p>   <span style="color: #27aae1;"  class="profile-link">{{ucfirst($user->firstname)}}&nbsp;{{ucfirst($user->firstname)}}&nbsp;&nbsp;&nbsp;</span>


                                              @endif
                                        @endforeach


                                              {{ $comment->comment  }}  </p>

                                           @endif

                            </div>

                            @if(Auth::user()->id == $comment->user_id)
                            <div class="row commetoptions">
                                <div class="col-md-1 col-md-offset-1">
                                    <a href="{{url('AcadPostComment/edit/'.$comment->id)}}" class="view text-primary">Edit</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{url('AcadPostComment/delete/'.$comment->id)}}" class="view text-danger">Delete</a>
                                </div>

                            </div>
                            @endif


                    @endforeach












                    <form action="{{route('savecomment')}}" method="post">
                    @csrf

                    <div class="post-comment">

                            @if(Auth::user()->id == $profiles->user_id)
                                <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="profile-photo-sm" />
                            @else
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                            @endif


                        <input type="text" name="comment" class="form-control" placeholder="Post a comment">
                    </div>

                    <input type="hidden" name="postid" value="{{$academicpost->id}}">
                    <div class="form-group">

                    <input type="submit" class="btn btn-primary hidden" value="add comment">

                    </div>

                    </form>

                </div>
                </div>



        </div>

            <hr>
        @endforeach

    </div>







    <!-- Newsfeed Common Side Bar Right
    ================================================= -->
    <div class="col-md-2 static">
        <div class="suggestions" id="sticky-sidebar">
            <h4 class="grey">Who to Follow</h4>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="timeline.html">Diana Amber</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="timeline.html">Cris Haris</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="timeline.html">Brian Walton</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="timeline.html">Olivia Steward</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="timeline.html">Sophia Page</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
        </div>
    </div>



@endsection
