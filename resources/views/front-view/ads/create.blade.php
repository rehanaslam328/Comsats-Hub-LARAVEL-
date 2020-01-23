@extends('front-view.master.front-master')
@section('front-master')

    <!-- Post Create Box
            ================================================= -->
    <div class="col-md-7">
        <h2>Post Free Ad</h2>

        <form class="form-horizontal" action="{{route('adsave')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="Name">Owner Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " name="name"  placeholder="Enter Owner Name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Title">Title:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Enter title">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="Description">Description:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="description"  placeholder="Enter description">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Condition">Condition:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="condition" placeholder="Enter condition">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Price">Price:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="price" placeholder="Enter price">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="hone No">Phone No:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phoneno" placeholder="Enter phone no">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="File">File:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" >
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Post Ad</button>
                </div>
            </div>
        </form>

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
