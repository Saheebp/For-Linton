
<!DOCTYPE html>
<html>
<head>
    <title>Contractor | Home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{ asset('admin/img/logo.ico') }}"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/components.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/vendors/wow/css/animate.css') }}"/>
    <!--End of Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/pages/login1.css') }}"/>
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
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 login_top_bottom">
            <div class="row">
                <div class="col-lg-5  col-md-8  col-sm-12 mx-auto">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center p-3">
                            <span class="text-dark">QUOTATION UPLOAD</span>
                        </h3>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                                {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                                {{ session('success') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
                    <div class="alert alert-danger pt-0 pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="bg-white login_content login_border_radius">
                        <form action="{{ route('quotes.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <label class="col-form-label"> Hi, {{ Auth::user()->org_name ?? Auth::user()->name }}!<br>Please upload the required documents requestion in the RFQ.</label>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Select Request you are Quoting for</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-envelope text-primary"></i></span>
                                    <!-- <input type="text" class="form-control  form-control-md" id="email" name="email" placeholder="E-mail"> -->
                                     <select class="form-control col-12" name="proc_request_id" required>
                                        <option value=""> -- Select Requests --</option>
                                        @foreach($requests as $request)
                                        <option value="{{ $request->procRequest->id }}">{{ $request->procRequest->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="files" class="col-form-label">Quotation Files</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-file text-primary"></i></span>
                                    <input type="file" class="form-control form-control-md" id="file"   name="file" placeholder="">
                                </div>
                            </div>

                            <div class="form-group mt-5">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="submit" value="Upload and Save" class="btn btn-success btn-block login_button">
                                    </div>

                                    </form>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <div class="col-lg-6">
                                        <a class="btn btn-primary btn-block login_button" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Keep me logged in</a>
                                    </label>
                                </div>
                                <div class="col-6 text-right forgot_pwd">
                                    <a href="forgot_password1.html" class="custom-control-description forgottxt_clr">Forgot password?</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 m-t-10">
                                    <div class="icon-white btn-facebook icon_padding loginpage_border">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span class="text-white icon_padding text-center question_mark">Log In With Facebook</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 pull-lg-right m-t-10">
                                    <div class="icon-white btn-google icon_padding loginpage_border">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        <span class="text-white icon_padding question_mark">Log In With Google+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Don't you have an Account? </label>
                            <a href='register1.html' class="text-primary"><b>Sign Up</b></a>
                        </div> -->
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
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="{{ asset('admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/vendors/wow/js/wow.min.js') }}"></script>
<!--End of plugin js-->
<script type="text/javascript" src="{{ asset('admin/js/pages/login1.js') }}"></script>
</body>

</html>
