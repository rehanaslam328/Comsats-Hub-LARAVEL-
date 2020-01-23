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
                                <button type="button" class="btn btn-primary add-general-post " data-toggle="modal" data-target="#myModal">
                                    Post An Add
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Upload Ad</h4>
                                </div>
                                <form  class="form-horizontal"  action="{{route('adsave')}}" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Name">Owner Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control " name="name"  placeholder="Enter Owner Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Title">Title:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Description">Description:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="description"  placeholder="Enter description">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Condition">Condition:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="condition" placeholder="Enter condition">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="Price">Price:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="price" placeholder="Enter price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="hone No">Phone No:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="phoneno" placeholder="Enter phone no">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="File">File:</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="file" >
                                            </div>
                                        </div>

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
        </div><!-- Post Create Box End-->

        <!-- Post Content
        ================================================= -->
        @if (session('adsuccess'))
            <div class="alert alert-success alert-dismissible">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{session('adsuccess')}}</p>

            </div>

        @elseif (session('deleteAd'))
            <div class="alert alert-danger alert-dismissible">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p >{{session('deleteAd')}}</p>

            </div>

        @elseif (session('updateAd'))
            <div class="alert alert-primary alert-dismissible">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p >{{session('updateAd')}}</p>

            </div>
        @endif
            <div >
                <h1>Ads</h1>
            </div>
           <div class="container-fluid">

                   <div class="media">
                       <div class="row js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
                           @foreach($ads as $ad )
                               <div class="grid-sizer col-md-6 col-sm-6"></div>
                               <div class="grid-item col-md-6 col-sm-6">
                                   <div class="media-grid">
                                       <a href="{{url('ads/show/'.$ad->id)}}">
                                       <div class="img-wrapper" data-toggle="modal" data-target=".modal-1">

                                           <img src="{{asset('storage/ad/'.$ad->image)}}" alt="" class="img-responsive post-image" />
                                       </div>
                                       </a>
                                       <div class="media-info">
                                           {{--<div class="reaction">--}}
                                           {{--<a class="btn text-green"><i class="fa fa-thumbs-up"></i> 63</a>--}}

                                           {{--</div>--}}


                                                   <div class="user-info">
                                                       <div class="container-fluid">

                                                           <div class="row pull-right">
                                                               <div class="col-md-3">
                                                                   <a href="{{url('ads/show/'.$ad->id)}}" class="view text-success ">Show</a>
                                                               </div>
                                                               @if(Auth::user()->id == $ad->user_id)
                                                                   <div class="col-md-3">
                                                                       <a href="{{url('ads/edit/'.$ad->id)}}" class="view text-primary ">Edit</a>
                                                                   </div>
                                                                   <div class="col-md-3">
                                                                       <a href="{{url('ads/delete/'.$ad->id)}}" class="view text-danger">Delete</a>
                                                                   </div>

                                                               @endif
                                                           </div>
                                                       </div>
                                                       <div class="line-divider"></div>

                                                       <div class="row">
                                                           <div class="col-md-12">

                                                               <p class="ad-price text-center" >RS {{$ad->price}}&nbsp;</p>
                                                               <p class="ad-price text-center">{{$ad->name}}</p>
                                                           </div>
                                                       </div>
                                                   </div>


                                       </div>



                                   </div>
                               </div>
                           @endforeach


                       </div>
                   </div>
                   </a>
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
