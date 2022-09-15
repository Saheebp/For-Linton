@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Users
    @parent
@stop

@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/dataTables.bootstrap.css')}}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/tables.css')}}" />
    <!--End of page level styles-->

@stop
{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-money"></i>
                        Users
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
                            <a href="#">Users</a>
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
                <div class="col-12 data_tables">
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
                    
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Create New User
                        </div>
                        <div class="card-body m-t-35">
                            <div class="col-lg-6  col-md-8  col-sm-12 mx-auto">

                                <p class="p-2">
                                    <form method="POST" action="{{ route('users.store') }}">
                                    @csrf

                                        <input type="text" hidden readonly name="is_contractor" value="false">
                                        <input type="text" hidden readonly name="is_admin" value="true">
                                        <input type="text" hidden readonly name="status_id" value="{{ $active }}">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                
                                                <div class="col-12">
                                                    <label for="subject1" class="col-form-label">
                                                        Name
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" id="name" class="form-control" placeholder=" Chukwu Idris Adebayo" name="name">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="subject1" class="col-form-label">
                                                        Email
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" id="email" class="form-control" placeholder=" abcd@gmail.com" name="email">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="subject1" class="col-form-label">
                                                        Phone
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <input type="tel" id="phone" class="form-control" placeholder=" 08012345678" name="phone">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <label for="subject1" class="col-form-label">
                                                        Role
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <select class="form-control col-12" name="role">
                                                            <option value=""> -- Select Role --</option>
                                                            @foreach($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="subject1" class="col-form-label">
                                                        Designation
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-home"></i>
                                                        </span>
                                                        <select class="form-control col-12" name="designation">
                                                            <option value=""> -- Select Designation --</option>
                                                            @foreach($designations as $designation)
                                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-5">
                                            <div class="row">
                                                <div class="col-lg-6 offset-md-3">
                                                    <input type="submit" value="Save and Create" class="btn btn-success btn-block login_button">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </p>
                            
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.inner -->
    </div>
@stop

