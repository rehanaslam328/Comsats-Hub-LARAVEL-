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
                                    @endif

                                    <h3>{{Auth::user()->firstname}}&nbsp;&nbsp;{{Auth::user()->lastname}}</h3>
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
                        <br>  <div>
                            <h1>Ads</h1>
                        </div>
                        @foreach($ads as $ad)

                            @if(Auth::user()->id == $ad->user_id)
                                <br>  <div class="post-content">
                                <div class="post-date hidden-xs hidden-sm">
                                    <h5>{{Auth::user()->firstname}}</h5>
                                    <p class="text-grey"> {{$ad->created_at->diffForHumans()}}</p>
                                </div>
                             <div class="jumbotron">




                                <div class="dropdown pull-right ">
                                                <a href="#"  data-toggle="dropdown" class="dropdown-toggle"><i class="fas fa-angle-down arrow-position" ></i></a>

                                                <ul class="dropdown-menu pull-right menu-move">
                                                    <li class=" down-arrow-item" ><a href="{{url('ads/show/'.$ad->id)}}">Show</a></li>
                                                        <li class="down-arrow-item"> <a href="{{url('ads/edit/'.$ad->id)}}" class="view text-primary">Edit</a></li>
                                                        <li class="down-arrow-item"><a href="{{url('ads/delete/'.$ad->id)}}" class="view text-danger">Delete</a></li>
                                                </ul>

                                </div>
                                <div class="row">
                                    <a href="{{url('ads/show/'.$ad->id)}}">
                                        <div class="col-md-6">
                                            <img src="{{asset('storage/ad/'.$ad->image)}}" alt=" no image" width="230px">
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-3">
                                            <p  class="adcontent">{{$ad->title}}</p>
                                            <p class="adcontent">{{$ad->price}}RS</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h4 class="adcontent">Owner Name</h4>
                                            <h5 class="adcontent">{{$ad->name}}</h5>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">

                                    </div>

                                </div>

                                </a>
                                <hr>
                            </div>
                            </div>
                            @endif
                        @endforeach
                    </div>





@endsection
