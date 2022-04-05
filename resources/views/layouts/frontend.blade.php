<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        STARKS | 
        @section('title')
        @show
    </title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('admin/img/logo1.ico') }}"/>

    <!--global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/components.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/custom.css')}}" />
    <!-- end of global styles-->

    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/chartist/css/chartist.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/circliful/css/jquery.circliful.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/pages/index.css')}}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change" />
    @yield('header_styles')
</head>

<body class="body">

<div id="wrap">
    
    <!-- /#top -->
    <div class="wrapper fixedNav_top justify-content-center">
        <!-- /#left -->
        <div id="" class="col-lg-10 col-sm-12 offset-md-1">

        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    <h4> <!--<img src="{{ asset('admin/img/logo1.ico') }}" class="admin_img" alt="logo"> --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STARKS ADMIN</h4>
                </a>
                
                
                <div class="topnav dropdown-menu-right">
                    
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <tag class="text-success">
                                <strong>Hi, {{ Auth::check() ? Auth::user()->org_name : '' }}</strong>
                            </tag> |

                            <a href="{{ route('welcome') }}" class="btn btn-secondary btn-sm">
                                <strong>Request For Quotes</strong>
                            </a> |

                            <a href="{{ route('documents') }}" class="btn btn-dark btn-sm">
                                <strong>Upload Registration Docs</strong>
                            </a> |

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-primary btn-sm" data-toggle="dropdown">
                                <strong>Logout</strong>
                                <i class="fa fa-sign-out"></i>
                            </a> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->

        <!-- Content -->
        @yield('content')
        <!-- Content end -->
        </div>
    </div>

</div>
<!-- /#wrap -->
<!-- global scripts-->
<script type="text/javascript" src="{{asset('admin/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/custom.js')}}"></script>
<!--end of global scripts-->

<!--  plugin scripts -->
<script type="text/javascript" src="{{asset('admin/vendors/countUp/js/countUp.min.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/flip/js/jquery.flip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pluginjs/jquery.sparkline.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/chartist/js/chartist.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pluginjs/chartist-tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/swiper/js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/circliful/js/jquery.circliful.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/flotchart/js/jquery.flot.js')}}" ></script>
<script type="text/javascript" src="{{asset('admin/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
<!--end of plugin scripts-->
<script type="text/javascript" src="{{asset('admin/js/pages/index.js')}}"></script>

<!-- page level js -->
@yield('footer_scripts')
<!-- end page level js -->

</body>
</html>