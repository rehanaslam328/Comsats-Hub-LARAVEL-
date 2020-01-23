@extends('front-view.master.front-master')
@section('front-master')


    <div class="col-md-7">
        <h2>Add General Post</h2>
        <div class="create-post">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="form-group">

                        <form action="{{route('profilephotosave')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="checkbox-inline">Upload Photo</label><br>
                            <input name="file" type="file"   class="form-control"  >

                            <br><button type="submit" class="btn btn-primary">Upload</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>




@endsection
