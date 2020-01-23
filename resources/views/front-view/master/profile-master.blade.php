<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Comsats Hub | A Complete Social Network Template</title>

    <!-- Stylesheets
    ================================================= -->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}" />
    {{--<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link href="{{asset('/css/emoji.css')}}" rel="stylesheet">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/faviiconcomsts.png')}}"/>
</head>
<body>

<!-- Header
    ================================================= -->
<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/index')}}">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('images/faviiconcomsts.png')}}" width="50px" alt="" class="auth-logo-image">

                        </div>
                        <div class="col-md-8 hub-logo-text ">
                            COMSATS HUB
                        </div>
                    </div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-menu">
                    <li class="dropdown">

                        <a href="{{url('/index')}}"  >Home </a>

                    </li>
                    <li class="dropdown">
                        <a href="{{url('/index/profile')}}"   role="button" aria-haspopup="true" aria-expanded="false">My Profile </a>

                    </li>

                    {{--<li class="dropdown"><a href="contact.html">Contact</a></li>--}}
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname}} <span><img src="{{asset('images/down-arrow.png')}}" alt="" /></span></a>
                        <ul class="dropdown-menu newsfeed-home">


                            <li>

                                <a href="{{url('AcadPost/index')}}" class="dropdown-item"  >Academia </a>

                            </li>
                            <li>

                                <a href="{{url('ads/index')}}"  class="dropdown-item" >Ads </a>

                            </li>
                            <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>


                    </li>
                </ul>
                {{--<form class="navbar-form navbar-right hidden-sm">--}}
                {{--<div class="form-group">--}}
                {{--<i class="icon ion-android-search"></i>--}}
                {{--<input type="text" class="form-control" placeholder="Search friends">--}}
                {{--</div>--}}
                {{--</form>--}}


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!--Header End-->

<div id="page-contents">
    <div class="container">
        <div class="row">

            <!-- Newsfeed Common Side Bar Left
            ================================================= -->
            <div class="col-md-3 static  ">
            @section('left-profile')
            @show
            <!--profile card ends-->
            </div>



            @section('front-master')
            @show



        </div>
    </div>
</div>



<!--preloader-->
<div id="spinner-wrapper">
    <div class="spinner"></div>
</div>
<!-- Scripts
================================================= -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.appear.min.js')}}"></script>
<script src="{{asset('js/jquery.incremental-counter.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky-kit.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>


</body>
</html>
