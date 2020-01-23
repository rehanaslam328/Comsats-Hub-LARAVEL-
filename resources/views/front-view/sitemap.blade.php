@extends('front-view.master.front-master')
@section('left-profile')
    <div class="profile-card">

        @if(Auth::user()->id == $profiles->user_id)
            <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="img-responsive profile-photo" />
            <h5><a href="{{url('/index/profile')}}" class="text-white ">{{ucfirst(Auth::user()->firstname)}}</a></h5>
        @endif
        {{--<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>--}}

    </div>
@endsection

@section('front-master')

    <div id="page-contents">
        <div class="container">
            <div class="row">

                <!-- Newsfeed Common Side Bar Left
          ================================================= -->


                <div class="col-md-7">


                        <h2>Sitemap</h2>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="list-group">
                                    <a href="{{url('/index')}}" class="list-group-item"><strong>></strong>&nbsp;&nbsp;My Newsfeed</a>
                                    <a href="{{url('/index/profile')}}" class="list-group-item"><strong>></strong>&nbsp;&nbsp;My Profile</a>
                                    <a href="{{url('AcadPost/index')}}" class="list-group-item"><strong>></strong>&nbsp;&nbsp;Academia</a>
                                    <a href="{{url('ads/index')}}" class="list-group-item"><strong>></strong>&nbsp;&nbsp;Ads</a>
                                </div>
                            </div>
                        </div>


                </div>


            </div>
        </div>
    </div>




@endsection

