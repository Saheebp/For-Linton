<!DOCTYPE html>
<html>
<head>
    <title>Lockscreen | Admire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{ asset('admin/img/logo1.ico') }}"/>
    <!-- Global styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/components.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/pages/login1.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/vendors/wow/css/animate.css') }}"/>
    <!--End of global styles-->
    <link rel="stylesheet" href="{{ asset('admin/css/pages/lockscreen.css') }}"/>
</head>
<body>
<!-- <div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{ asset('admin/img/loader.gif') }}" style=" width: 40px;" alt="loading...">
    </div>
</div> -->
<div>
    <div class="login-container  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="row">
            
        <div class="col-lg-12 login_border_radius lockscreen_content">
                <div class="form-box">
                    <div class="form">
                        <p class="form-control-static">403</p>
                        <p class="form-control-static">Page Not Found</p>
                        <!-- <input type="password" name="user" class="form-control" placeholder="Password"> -->
                        <a class="btn btn-primary btn-block login" id="" href="{{ route('admin.home') }}">Continue to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/vendors/wow/js/wow.min.js') }}"></script>
<!-- end of global js-->
<!-- page level js-->
<script type="text/javascript" src="{{ asset('admin/js/pages/lockscreen.js') }}"></script>
<script>
    new WOW().init();
</script>
</body>

</html>