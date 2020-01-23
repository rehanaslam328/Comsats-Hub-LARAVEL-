@extends('front-view.master.front-master')
@section('front-master')

    <!-- Post Create Box
            ================================================= -->
    <div class="col-md-7">
        <h2>Add General Post</h2>
        <div class="create-post">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="form-group">

                        <form action="{{route('gensave')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <input name="title" type="text"   class="form-control" placeholder="Write what you wish" required>

                            {{--<label class="checkbox-inline"><input type="checkbox"  id="word">Video</label>--}}
                            <label class="checkbox-inline"><input type="checkbox"  id="file">IMAGE</label><br>

                            {{--<label for="" style="display: none" class="word">Select Video</label>--}}
                            {{--<input style="display: none"   type="file" name="video"  class="form-control word" >--}}
                            <label for="" style="display: none" class="file">Select Image</label>
                            <input style="display: none"  type="file" name="file"  class="form-control file" >
                            <label for="sel1">Select Category:</label><br>
                            <select class="form-control" name="gencategory" id="sel1">
                                @foreach($genPostsCategory as $genPosts)
                                    <option value="{{$genPosts->id}}">{{$genPosts->type}}</option>
                                @endforeach
                            </select>


                            <br><button type="submit" class="btn btn-primary">Publish</button>
                        </form>

                    </div>
                </div>

            </div>
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
