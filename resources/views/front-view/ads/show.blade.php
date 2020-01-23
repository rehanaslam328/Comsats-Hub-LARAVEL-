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

    <!-- Post Create Box
            ================================================= -->

    <div class="col-md-7 create-post-top">
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
                            <a type="button"href="{{'/ads/index'}}" class="btn btn-primary add-general-post ">
                             Back
                            </a>
                        </div>
                    </div>







                </div>
            </div>
        </div><!-- Post Create Box End-->

        <!-- Post Content
        ================================================= -->

        <div >
            <h1>Ads</h1>
        </div>
        <div class="container-fluid">

               <div class="row">
                 <div class=col-md-7>
                     <h4>Title</h4>
                     <p><b>{{$ad->title}}</b></p>
                 </div>
               </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('storage/ad/'.$ad->image)}}" alt="" class="img-responsive post-image" />

                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Description:</h4>
                    <p><b>


                            {{$ad->description}}
                        </b></p>

                </div>
            </div>
               <div class="row">
                   <div class="col-md-6">
                       <h4>Owner Name:</h4>
                       <p><b>{{$ad->name}}</b></p>
                   </div>
                   <div class="col-md-6">
                       <h4>Phone No:</h4>
                       <p><b>{{$ad->phoneno}}</b></p>
                   </div>
               </div>
            <hr>

        </div>
    </div>








    <!-- Newsfeed Common Side Bar Right
    ================================================= -->
    <div class="col-md-2 static affix">
        <div class="suggestions" id="sticky-sidebar">
            <h4 class="grey">Who to Follow</h4>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="#">Waleed Aslam</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="#">Ijaz Sidique</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="#">Shahid Afridi</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="#">Nazish Farooq</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
            <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h5><a href="timeline.blade.php">Ali Atif</a></h5>
                    <a href="#" class="text-green">Add friend</a>
                </div>
            </div>
        </div>
    </div>

@endsection
