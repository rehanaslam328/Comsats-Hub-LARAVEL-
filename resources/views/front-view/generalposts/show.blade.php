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
                            <a  href="{{url('/index')}}" class="btn btn-primary add-general-post " >
                               Back
                            </a>
                        </div>
                    </div>







                </div>
            </div>
        </div>
        <!-- Post Content
        ================================================= -->


        <div>
            <h1>General Posts</h1>
        </div>
        <hr>


            <div class="post-content">
                <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="user" class="profile-photo-md pull-left post-profile-pic" />

                <div class="user-info">
                    @foreach($users as $user)
                        @if($user->id == $post->user_id)
                            <h5><a href="timeline.html" class="profile-link profile-name">{{ ucfirst($user->firstname) }}&nbsp;{{ ucfirst($user->lastname) }}</a></h5>
                        @endif
                    @endforeach
                    <p class="text-muted profile-name">Published a photo about {{$post->created_at->diffForHumans()}}</p>
                </div>
                {{--<div class="reaction">--}}
                {{--<a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>--}}

                {{--</div>--}}
                <div class="line-divider"></div>
                <div class="post-text">
                    <p id="academicposttitle">{{$post->post}}</p>
                </div>
                <div class="line-divider"></div>

                @if($post->filetype=='jpg')
                    <img src="{{asset('storage/generalposts/'.$post->file)}}" alt="post-image" class="img-responsive post-image" />


                @endif

                <div class="container-fluid">


                    <div class="line-divider"></div>
                </div>

                <div class="post-container">

                    <button data-toggle="collapse" data-target="#demo" class="btn btn-info">Comments</button>
                    <div class="post-detail collapse"  id="demo">
                        <div class="line-divider"></div>
                        @foreach($comments as $comment)
                            <div class="post-comment ">
                                @if($comment->acad_id==$post->id )
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
                                        <a href="{{url('GenPost/edit/'.$comment->id)}}" class="view text-primary">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{url('GenPost/delete/'.$comment->id)}}" class="view text-danger">Delete</a>
                                    </div>

                                </div>
                            @endif


                        @endforeach













                    </div>
                </div>



            </div>

            <hr>


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
