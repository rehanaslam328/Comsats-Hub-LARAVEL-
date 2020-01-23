@extends('admin-view.master.master')

@section('internal-view')
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            @role('admin')
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">{{$userCount}} Users!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('user/index')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
            @else
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5"> Users!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            @endrole
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-sticky-note"></i>
                    </div>
                    <div class="mr-5">{{$generalPostCount}} General Posts!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/genpost')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-sticky-note"></i>
                    </div>
                    <div class="mr-5">{{$academicPostCount}} Academic Posts!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/acadpost')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">

                        <i class="fas fa-fw fa-ad"></i>
                    </div>
                    <div class="mr-5">{{$adCount}} Ads!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/ads')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
    </div>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Users

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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


