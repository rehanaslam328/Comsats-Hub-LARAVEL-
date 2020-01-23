@extends('front-view.master.profile-master')
@section('front-master')


<div class="container">

    <!-- Timeline
    ================================================= -->
    <div class="timeline">
        <div class="timeline-cover">

            <!--Timeline Menu for Large Screens-->
            <div class="timeline-nav-bar hidden-sm hidden-xs">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-info">

                               @if(Auth::user()->id == $profiles->user_id)
                            <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="img-responsive profile-photo" />
                               @else
                                <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                                @endif

                            <h3>{{ucfirst(Auth::user()->firstname)}}&nbsp;&nbsp;{{ucfirst(Auth::user()->lastname)}}</h3>
                            <a href="{{url('/profile/photo')}}" class="btn btn-primary">Upload profile photo</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <ul class="list-inline profile-menu">
                            <li><a href="{{url('/index/profile')}}" >Timeline</a></li>
                            <li><a href="{{url('/index/profile/ads')}}" >Ads</a></li>
                            <li><a href="{{url('/index/profile/about')}}" >About</a></li>


                            {{--<li><a href="timeline-about.html">About</a></li>--}}
                            {{--<li><a href="timeline-album.html">Album</a></li>--}}
                            {{--<li><a href="timeline-friends.html">Friends</a></li>--}}
                        </ul>
                        {{--<ul class="follow-me list-inline">--}}
                            {{--<li>1,299 people following her</li>--}}
                            {{--<li><button class="btn-primary">Add Friend</button></li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
            </div><!--Timeline Menu for Large Screens End-->

            <!--Timeline Menu for Small Screens-->
            <div class="navbar-mobile hidden-lg hidden-md">
                <div class="profile-info">
                    @if(Auth::user()->id == $profiles->user_id)
                        <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="img-responsive profile-photo" />
                    @endif
                    <h4>{{Auth::user()->firstname}}&nbsp;&nbsp;{{Auth::user()->lastname}}</h4>

                </div>
                <div class="mobile-menu">
                    <ul class="list-inline">
                        <li><a href="{{url('/index/profile')}}" >Timeline</a></li>
                        <li><a href="{{url('/index/profile/ads')}}" >Ads</a></li>
                        <li><a href="{{url('/index/profile/about')}}" >About</a></li>

                        {{--<li><a href="timeline-about.html">About</a></li>--}}
                        {{--<li><a href="timeline-album.html">Album</a></li>--}}
                        {{--<li><a href="timeline-friends.html">Friends</a></li>--}}
                    </ul>
                    {{--<button class="btn-primary">Add Friend</button>--}}
                </div>
            </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">

                    <!-- Post Create Box
                    ================================================= -->
                    {{--<div class="create-post">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-7 col-sm-7">--}}
                                {{--<img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />--}}
                                {{--<a class="btn btn-primary  " href="{{url('GenPost/create')}}">Post here</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div><!-- Post Create Box End-->--}}

                    <!-- Post Content
                    ================================================= -->
                    <br><div >
                        <h1>General Posts</h1>
                    </div>
                    @foreach($generalposts as $genpost)
                        @if(Auth::user()->id == $genpost->user_id)
                          <vr></vr>  <br> <div class="post-content">
                            <div class="post-date hidden-xs hidden-sm">
                                <h5>{{Auth::user()->firstname}}</h5>
                                <p class="text-grey"> {{$genpost->created_at->diffForHumans()}}</p>
                            </div>
                            {{--@if($genpost->filetype=='jpg')--}}

                            <img src="{{asset('storage/generalposts/'.$genpost->file)}}" alt="post-image" class="img-responsive post-image" />

                                {{--@elseif($academicpost->filetype=='pdf')--}}
                            {{--<div class="container-fluid">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-md-1">--}}
                            {{--<img src="{{asset('images/pdf-icon.png')}}" alt="no icon" height="35px">--}}

                            {{--</div>--}}
                            {{--<div class="col-md-5">--}}
                            {{--<a href="{{url('/Acadpost/pdf-downlaod/'.$academicpost->id)}}">     <p >{{$academicpost->image}}</p>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--@elseif($academicpost->filetype=='docx')--}}
                            {{--<div class="container-fluid">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-md-1">--}}
                            {{--<img src="{{asset('images/word-icon.png')}}" alt="no icon" height="35px">--}}

                            {{--</div>--}}
                            {{--<div class="col-md-5">--}}
                            {{--<a href="{{url('/Acadpost/word-downlaod/'.$academicpost->id)}}">     <p >{{$academicpost->image}}</p>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            <div class="post-text">
                                <p>{{$genpost->title}}</p>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-md-1">
                                        <a href="{{url('GenPost/show/'.$genpost->id)}}" class="view text-success">Show</a>
                                    </div>
                                        <div class="col-md-1">
                                            <a href="{{url('GenPost/edit/'.$genpost->id)}}" class="view text-primary">Edit</a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="{{url('GenPost/delete/'.$genpost->id)}}" class="view text-danger">Delete</a>
                                        </div>


                                </div>
                            </div>


                            <div class="post-container">
                                <div class="row">
                                    <div class="col-md-2">

                                        @if(Auth::user()->id == $profiles->user_id)
                                            <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="img-responsive profile-photo" />

                                        @endif
                                    </div>
                                    <div class="col-md-7">

                                        <div class="user-info">
                                            <h5><a href="timeline.html" class="profile-link">{{ ucfirst(Auth::user()->firstname) }}&nbsp;{{ ucfirst(Auth::user()->lastname) }}</a></h5>
                                            <p class="text-muted">Published a post about {{$genpost->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="post-detail">
                                    {{--<div class="reaction">--}}
                                    {{--<a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>--}}

                                    {{--</div>--}}
                                    <div class="line-divider"></div>
                                    <div class="line-divider"></div>



                                    @foreach($comments as $comment)
                                        @if(Auth::user()->id == $comment->user_id)
                                        <div class="post-comment">
                                            @if($comment->general_post_id==$genpost->id )



                                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />

                                                    @foreach($users as $user)
                                                    @if($user->id==$comment->user_id)
                                                        <p>   <a href="timeline.html" class="profile-link">{{$user->firstname }}&nbsp;&nbsp;&nbsp;</a>

                                                            @endif
                                                            @endforeach
                                                            {{ $comment->comment  }}  </p>

                                                        @if(Auth::user()->id == $comment->user_id)
                                                            <div class="col-md-1">
                                                                <a href="{{url('GenPost/edit/'.$comment->id)}}" class="view text-primary">Edit</a>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <a href="{{url('GenPost/delete/'.$comment->id)}}" class="view text-danger">Delete</a>
                                                            </div>


                                                        @endif
                                                    @endif
                                        </div>
                                        @endif
                                    @endforeach



                                </div>
                            </div>



                        </div>

                        <hr>
                        @endif

                    @endforeach



                </div>

                {{--<div class="col-md-2 static">--}}
                    {{--<div id="sticky-sidebar">--}}
                        {{--<h4 class="grey">Sarah's activity</h4>--}}
                        {{--<div class="feed-item">--}}
                            {{--<div class="live-activity">--}}
                                {{--<p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>--}}
                                {{--<p class="text-muted">5 mins ago</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="feed-item">--}}
                            {{--<div class="live-activity">--}}
                                {{--<p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>--}}
                                {{--<p class="text-muted">an hour ago</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="feed-item">--}}
                            {{--<div class="live-activity">--}}
                                {{--<p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>--}}
                                {{--<p class="text-muted">4 hours ago</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="feed-item">--}}
                            {{--<div class="live-activity">--}}
                                {{--<p><a href="#" class="profile-link">Sarah</a> has shared an album</p>--}}
                                {{--<p class="text-muted">a day ago</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>





@endsection
