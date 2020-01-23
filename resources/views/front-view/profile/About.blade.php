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
                        <h4>{{ucfirst(Auth::user()->firstname)}}&nbsp;&nbsp;{{ucfirst(Auth::user()->lastname)}}</h4>

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


                    <!-- Post Content
                    ================================================= -->
                        <br><div >
                            <h1>About</h1>

                            <div class="about-profile">
                                <div class="about-content-block">
                                    <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>First Name:</h4>
                                            <p>{{ucfirst($user->firstname)}}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Last Name:</h4>
                                            <p>{{ucfirst($user->lastname)}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>Email:</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>Date of Birth</h4>
                                        </div>
                                        <div class="col-md-5">

                                           <p> <i class="fa fa-birthday-cake dateofbirth"></i>&nbsp;{{$user->day}}/{{$user->month}}/{{$user->year}}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="about-content-block">
                                    <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Department</h4>
                                    <div class="organization">
                                        <img src="../../../public/images/envato.png" alt="" class="pull-left img-org" />
                                        <div class="work-info">
                                            <h5>Department Name</h5>
                                            <p>-&nbsp;&nbsp;{{$user_department}}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="about-content-block">
                                    <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
                                    <p>{{ucfirst($user->city)}}, {{ucfirst($user->country)}}</p>

                                </div>
                                <div class="about-content-block">
                                    <a href="{{url('/about/edit')}}" class="btn btn-primary">Edit your information</a>

                                </div>

                            </div>
                        </div>





                    </div>


                </div>
            </div>
        </div>
    </div>





@endsection
