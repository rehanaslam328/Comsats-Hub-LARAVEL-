@extends('admin-view.master.master')

@section('internal-view')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Users
            <a href="{{ url('/user/index') }}" class="btn btn-info">
                <i class="fas fa-backward add-role"></i>
                Back
            </a>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Day</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Roles</th>

                    </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->day}}</td>
                            <td>{{$user->month}}</td>
                            <td>{{$user->year}}</td>
                            <td>{{$user->optradio}}</td>
                            <td>{{$user->city}}</td>
                            <td>{{$user->country}}</td>
                            <td>
                        @foreach($userroles as $userrole)
                                {{$userrole->name}}<br>
                            @endforeach
                          </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    </div>
    <!-- /.container-fluid -->
@endsection


