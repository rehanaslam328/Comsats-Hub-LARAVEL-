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

          <!-- Post Create Box
          ================================================= -->
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
                    <h1>IMAGES</h1>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- Post Create Box End -->

          <!-- Media
          ================================================= -->
          <div class="media">
            <div class="row js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
              @foreach($genposts as $genpost)
                @if($genpost->filetype=="mp4")
                <div class="grid-sizer col-md-6 col-sm-6"></div>
                <div class="grid-item col-md-6 col-sm-6">
                  <div class="media-grid">
                    <div class="img-wrapper" data-toggle="modal" data-target=".modal-1">
                      @if($genpost->filetype=="mp4")
                      <video controls>
                        <source src="{{asset('storage/generalposts/'.$genpost->file)}}" type="video/mp4">
                      </video>
                        @endif
                    </div>
                    <div class="media-info">

                      @foreach($users as $user)
                        @if($user->id == $genpost->user_id )
                          <div class="user-info">
                            @if($user->id == $profiles->user_id)
                              <img src="{{asset('storage/profilephotos/'.$profiles->profilephoto)}}" alt="" class="profile-photo-sm pull-left" />

                            @else
                              <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            @endif
                            <div class="user">

                              <h6><p  class="profile-link image-poster-name">{{ ucfirst($user->firstname) }} &nbsp;{{ucfirst($user->lastname)}}</p></h6>

                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>



                  </div>
                </div>
                @endif
              @endforeach


            </div>
          </div>
        </div>


      </div>
    </div>
  </div>




@endsection

