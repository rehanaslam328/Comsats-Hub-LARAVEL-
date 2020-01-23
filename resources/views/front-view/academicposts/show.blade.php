@extends('front-view.master.front-master')
@section('front-master')

    <!-- Post Create Box
            ================================================= -->
    <div class="col-md-7">
        <div class="create-post">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />

                </div>
            </div>
        </div><!-- Post Create Box End-->

        <!-- Post Content
        ================================================= -->

        <div >
            <h1> Show Academic Post</h1>
        </div>


                <div class="jumbotron">

                    @if($post->filetype=='jpg')
                        <img src="{{asset('storage/Academicposts/'.$post->image)}}" alt="post-image" class="img-responsive post-image" />
                    @elseif($post->filetype=='pdf')
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{asset('images/pdf-icon.png')}}" alt="no icon" height="35px">

                                </div>
                                <div class="col-md-5">
                                    <a href="{{url('/Acadpost/pdf-downlaod/'.$post->id)}}">     <p >{{$post->image}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @elseif($post->filetype=='docx')
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{asset('images/word-icon.png')}}" alt="no icon" height="35px">

                                </div>
                                <div class="col-md-5">
                                    <a href="{{url('/Acadpost/word-downlaod/'.$post->id)}}">     <p >{{$post->image}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>


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
