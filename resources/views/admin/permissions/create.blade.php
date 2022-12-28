@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Routes
    @parent
@stop

@section('header_styles')
    <!--plugin styles-->
    <link rel="stylesheet" href="{{asset('vendors/intl-tel-input/css/intlTelInput.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/sweetalert/css/sweetalert2.min.css')}}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/sweet_alert.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/form_layouts.css')}}" />
    <!-- end of page level styles -->
@stop
{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-file-o"></i>
                        Routes
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home')}}">
                                <i class="fa ti-file" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Routes</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-light lter bg-container">
            <div class="row">
                    <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success pt-0 pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('failure'))
                        <div class="alert alert-danger pt-0 pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Add a Route
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                        <form class="form-horizontal" action="{{ route('routes.store')}}" method="POST">
                                            @csrf
                                                <fieldset>
                                                    <!-- Name input-->
                                                    <div class="form-group row m-t-25">
                                                        <div class="col-lg-12">
                                                            <label for="origin" class="col-form-label form-group-horizontal">
                                                                Origin
                                                            </label>
                                                            <div class="input-group input-group-prepend">
                                                            <span class="input-group-text border-right-0 rounded-left">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="origin" placeholder="Origin" name="origin">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- last name-->
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <label for="destination" class="col-form-label form-group-horizontal">
                                                                Destination
                                                            </label>
                                                            <div class="input-group input-group-prepend">
                                                    <span class="input-group-text border-right-0 rounded-left">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                                <input type="text" class="form-control" id="destination" placeholder="Destination" name="destination">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- mail name-->
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <label for="amount" class="col-form-label form-group-horizontal">
                                                                Amount
                                                            </label>
                                                            <div class="input-group input-group-prepend">
                                                    <span class="input-group-text border-right-0 rounded-left">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                                <input type="tel" id="amount" class="form-control" placeholder="Amount" name="amount">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- password-->
                                                
                                                    <!-- re password name-->
                                                    
                                                    <div class="form-group row">
                                                        <div class="col-lg-11">
                                                            <button class="btn btn-primary " type="submit">Create</button>
                                                            <button class="btn btn-warning " type="reset">Cancel</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
    <!-- /.content -->
@stop


@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('vendors/intl-tel-input/js/intlTelInput.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
    <!--End of Plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('js/pages/form_layouts.js')}}"></script>
    <!-- end of page level js -->
@stop