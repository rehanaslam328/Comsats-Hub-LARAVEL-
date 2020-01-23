<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comsats Hub Admin Panel</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{url('admin/index')}}">Comsats Hub</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            {{--<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">--}}
            <div class="input-group-append">
                {{--<button class="btn btn-primary" type="button">--}}
                    {{--<i class="fas fa-search"></i>--}}
                {{--</button>--}}
            </div>
        </div>
    </form>


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <p style="color: white;padding-top: 7px">{{Auth::user()->firstname}}</p>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                {{--<a class="dropdown-item" href="#">Settings</a>--}}
                {{--<a class="dropdown-item" href="#">Activity Log</a>--}}
                <div class="dropdown-divider"></div>

                {{--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>--}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{url('admin/index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Comsats Hub</span>
            </a>
        </li>
        {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--<i class="fas fa-fw fa-folder"></i>--}}
                {{--<span>Pages</span>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
                {{--<h6 class="dropdown-header">Login Screens:</h6>--}}
                {{--<a class="dropdown-item" href="../forgot-password.html">Forgot Password</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<h6 class="dropdown-header">Other Pages:</h6>--}}
                {{--<a class="dropdown-item" href="../404.html">404 Page</a>--}}
                {{--<a class="dropdown-item" href="../blank.html">Blank Page</a>--}}
            {{--</div>--}}
        {{--</li>--}}
        @role('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{url('user/index')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
        </li>
        @endrole
        <li class="nav-item">
            <a class="nav-link" href="{{url('role/index')}}">
                <i class="fas fa-fw fa-list"></i>
                <span>Roles</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/genpost')}}">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span>General Posts</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/acadpost')}}">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span>Academic Posts</span></a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="{{url('admin/ads')}}">
                <i class="fas fa-fw fa-ad"></i>
                <span> Ads</span></a>
        </li>


    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>



            @section('internal-view')

            @show



















        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Comsats-Hub 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->

<script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('admin/js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>


</body>

</html>
