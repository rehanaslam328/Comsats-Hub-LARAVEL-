@extends('admin-view.master.master')

@section('internal-view')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Roles
            <a href="{{ url('/role/index') }}" class="btn btn-info">
                <i class="fas fa-backward add-role"></i>
                Back
            </a>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Permissions</th>

                    </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                        @foreach($rolePermissions as $rolePermission)
                                {{$rolePermission->name}}<br>
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


