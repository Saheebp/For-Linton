@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Roles & Permissions
    @parent
@stop
@section("header_styles")
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/blank.css')}}"/>
    <!--End of page level styles-->
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-file-o"></i>
                        Roles
                    </h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <ol class="breadcrumb nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Roles & Permissions</a>
                            </li>{{--
                            <li class="breadcrumb-item active">Bank</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner lter bg-container">
            <div class="row mx-auto">
                {{--@foreach($permissions as $permission)
                    <p>{{ $permission }}</p>
                @endforeach--}}
                <div class="card col-lg">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable">
                            {{ session('success') }}
                        </div>
                    @elseif(session('failure'))
                        <div class="alert alert-danger alert-dismissable">
                            {{ session('failure') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Create Role
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('roles.store')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Role Name</label>
                                    <input type="text" class="form-control is-valid" id="name" name="name" value="{{ old('name') }}" required>
                                    {{--@if($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif--}}
                                </div>

                                <div class="form-group">
                                    <label class="form-col-form-label font-weight-bold" for="permission">Select Permissions</label>
                                    @if($permissions->count() == 0)
                                        No permissions available
                                    @else
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                
                                                <div class="col-6 mb-3">
                                        
                                                    <div class="col-12">
                                                        <input title="Permission" type="checkbox" id="permission[]" name="permission[]" value="{{ $permission->id }}" class="text-capitalize"> <label for="permission[]">{{ $permission->name }}</label>
                                                    </div>
                                                
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Create Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
    <!-- /.content -->
@stop

