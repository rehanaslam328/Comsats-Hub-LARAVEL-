@extends('admin-view.master.master')

@section('internal-view')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Role</div>
            <div class="card-body">
                <form action="{{route('saverole')}}" method="post" >
                          @csrf
                    <div class="form-group">
                        <label for="Rolename">Name</label>
                        <input type="text"  class="form-control" name="name" placeholder="Enter Role Name">

                    </div>
                    <div class="form-group">
                        <label for="displayname">Display Name</label>
                        <input type="text"  class="form-control" placeholder="Enter display_name" name="display_name" >

                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"  class="form-control" placeholder="Enter description" name="description">

                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="check1">
                            @foreach($permissions as $permission)
                                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}" >{{$permission->name}}
                                <br>
                            @endforeach

                        </label>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Create Role">
                </form>

            </div>
        </div>
    </div>


@endsection