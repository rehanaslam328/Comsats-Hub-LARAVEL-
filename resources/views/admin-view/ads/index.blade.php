@extends('admin-view.master.master')

@section('internal-view')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Ads
            {{--<a  href="{{url('ads/create')}}">--}}
                {{--<i class="fas fa-plus-circle add-role"></i>--}}
                {{--create Ad--}}

            {{--</a>--}}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Owner Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Condition</th>
                        <th>Price</th>
                        <th>Phone No</th>
                        <th>image</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($ads as $ad)
                        <tr>
                            <td>{{ $ad->name}}</td>
                            <td>{{$ad->title}}</td>
                            <td>{{$ad->description}}</td>
                            <td>{{ $ad->condition}}</td>
                            <td>{{ $ad->price}}</td>
                            <td>{{ $ad->phoneno}}</td>
                            <td><img src="{{asset('storage/ad/'.$ad->image)}}" alt="" class="img-responsive" width="150px" height="150px"></td>
                            {{--<td><a href="{{url('role/show/'.$role->id)}}" class="view text-success "><i class="fas fa-eye text-success"></i>View</a></td>--}}
                            {{--<td><a href="{{url('role/edit/'.$role->id)}}" class="view text-primary"><i class="fas fa-edit text-primary"></i>Edit</a></td>--}}
                            <td><a href="{{url('/admin/ads/delete/'.$ad->id)}}" class="view text-danger"><i class="fas fa-trash-alt text-danger"></i>Delete</a></td>
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


