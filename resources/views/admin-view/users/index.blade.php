@extends('admin-view.master.master')

@section('internal-view')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Users

        </div>
        @if(session('usersucess'))

            <p class="alert alert-success  ">{{session('usersucess')}}</p>
            @elseif(session('roledelete'))
            <p class="alert alert-danger">{{session('roledelete')}}</p>

        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>

                        <th>Day</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->day}}</td>
                        <td>{{$user->month}}</td>
                        <td>{{$user->year}}</td>
                        <td>{{$user->optradio}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->country}}</td>

                        <td><a href="{{url('user/show/'.$user->id)}}" class="view text-success "><i class="fas fa-eye text-success"></i>View</a></td>
                        <td><a href="{{url('user/edit/'.$user->id)}}" class="view text-primary"><i class="fas fa-edit text-primary"></i>Edit</a></td>

                        <td><a href="{{url('user/delete/'.$user->id)}}" class="view text-danger "><i class="fas fa-trash-alt text-danger"></i>Delete</a></td>

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


