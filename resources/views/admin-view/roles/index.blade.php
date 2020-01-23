@extends('admin-view.master.master')

@section('internal-view')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Roles
            {{--<a  href="{{url('role/create')}}">--}}
                {{--<i class="fas fa-plus-circle add-role"></i>--}}
                {{--Add Role--}}

            {{--</a>--}}
        </div>
        @if(session('rolesucess'))

            <p class="alert alert-success  ">{{session('rolesucess')}}</p>
            @elseif(session('roledelete'))
            <p class="alert alert-danger">{{session('roledelete')}}</p>

        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>View</th>
                        @permission('role-edit')
                        <th>Edit</th>
                        @endpermission
                        @permission('role-delete')
                        <th>Delete</th>
                            @endpermission
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>{{$role->description}}</td>
                        <td><a href="{{url('role/show/'.$role->id)}}" class="view text-success "><i class="fas fa-eye text-success"></i>View</a></td>
                        @permission('role-edit')

                        <td><a href="{{url('role/edit/'.$role->id)}}" class="view text-primary"><i class="fas fa-edit text-primary"></i>Edit</a></td>
                        @endpermission
                        @permission('role-delete')

                        <td><a href="{{url('role/delete/'.$role->id)}}" class="view text-danger"><i class="fas fa-trash-alt text-danger"></i>Delete</a></td>
                       @endpermission
                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    </div>
    <!-- /.container-fluid -->
@endsection


