@extends('admin-view.master.master')

@section('internal-view')

    <div class="container">

        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Role</div>
            <div class="card-body">
                <form action="{{route('update')}}"  method="post" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="Rolename">Id</label>
                        <input type="text"  class="form-control" name="id" value="{{$roles->id}}" placeholder="Enter Role Name">

                    </div>

                    <div class="form-group">
                        <label for="displayname">Name</label>
                        <input type="text"  class="form-control" placeholder="Enter display_name" value="{{$roles->name}}" name="name" >

                    </div>
                    <div class="form-group">
                        <label for="displayname">Display Name</label>
                        <input type="text"  class="form-control" placeholder="Enter display_name" value="{{$roles->display_name}}" name="display_name" >

                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"  class="form-control" placeholder="Enter description" value="{{$roles->description}}" name="description">

                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="check1"></label>
                            @foreach($permissions as $permission)
                                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}"
                                        {{in_array($permission->id,$rolePermissions)? "checked":""}}>{{$permission->name}}
                                <br>
                            @endforeach

                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Update Role With Permissions">
                </form>

            </div>
        </div>
    </div>


@endsection