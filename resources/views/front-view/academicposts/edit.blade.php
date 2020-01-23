@extends('front-view.master.front-master')
@section('front-master')

    <!-- Post Create Box
            ================================================= -->
    <div class="col-md-7">
        <h2>Edit Academicposts</h2>

        <form action="{{route('acadupdate')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <input name="id" type="text"  value="{{$post->id}}" class="form-control" placeholder="Write what you wish" required>
            <input name="title" type="text"  value="{{$post->title}}" class="form-control" placeholder="Write what you wish" required>
            <label class="checkbox-inline"><input type="checkbox"  id="pdf" >PDF</label>
            <label class="checkbox-inline"><input type="checkbox"  id="word">WORD</label>
            <label class="checkbox-inline"><input type="checkbox"  id="file">IMAGE</label><br>
            <label for="" style="display: none" class="pdf">Select Pdf</label>
            <input style="display: none"  type="file"  name="pdf"  class="form-control pdf" >
            <label for="" style="display: none" class="word">Select word</label>
            <input style="display: none"   type="file" name="word"  class="form-control word" >
            <label for="" style="display: none" class="file">Select Image</label>
            <input style="display: none"  type="file" name="file"  class="form-control file" ><br>
            <label for="sel1">Select Category:</label><br>
            <select class="form-control" name="acadcategory" id="sel1">
                @foreach($acadPostsCategory as $acadPost)
                    <option value="{{$acadPost->id}}">{{$acadPost->type}}</option>
                @endforeach
            </select>


            <br><button type="submit" class="btn btn-primary">Update</button>
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
