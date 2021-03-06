@extends('admin-view.master.master')

@section('internal-view')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
          Academic Posts
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

                    <th>Title</th>

                    <th>image</th>
                    <th>Delete</th>

                </tr>
                </thead>

                <tbody>
                @foreach($ads as $ad)
                <tr>

                    <td>{{$ad->title}}</td>

                    <td>{{ $ad->image}}</td>
<!--                    {{--<td><a href="{{url('role/show/'.$role->id)}}" class="view text-success "><i class="fas fa-eye text-success"></i>View</a></td>--}}-->
<!--                    {{--<td><a href="{{url('role/edit/'.$role->id)}}" class="view text-primary"><i class="fas fa-edit text-primary"></i>Edit</a></td>--}}-->
                     @permission('post-delete')
                   <td><a href="{{url('/admin/academicpost/delete/'.$ad->id)}}" class="view text-danger"><i class="fas fa-trash-alt text-danger"></i>Delete</a></td>
                    @endpermission
                    <!--                </tr>-->
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


