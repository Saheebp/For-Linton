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
        <div class="inner bg-light lter bg-container">
            <div class="row">
                <div class="card">
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
                        <i class="fa fa-align-justify"></i> All Roles
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('roles.update', $role->id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">Role Name</label>
                                    <input type="text" class="form-control is-valid" id="name" name="name" value="{{ $role->name }}" required @if($role->name == 'Super-Admin') readonly @endif>
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="form-col-form-label font-weight-bold" for="permission">Permissions</label>
                                    @if($permissions->count() == 0)
                                        No permissions available
                                    @else
                                        <div class="row">
                                            @foreach($permissions->chunk(5) as $permission)
                                                @foreach($permission as $perm)
                                                    <div class="col-3">
                                                        <input type="checkbox" id="permission[]" name="permission[]" value="{{ $perm->id }}" @if(in_array($perm->id, $rolePermissions)) checked @endif @if($role->name == 'Super-Admin') onclick="return false;" @endif> {{ $perm->name }}
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endif
                                    <span class="text-danger">
                                        {{ $errors->first('permission') }}
                                    </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-primary">Update Role</button>
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

