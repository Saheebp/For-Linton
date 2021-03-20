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
                                <a href="#>
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
        <div class="inner bg-container">
            <div class="row">
                {{--@foreach($roles as $role)
                    <p>{{ $role }}</p>
                @endforeach--}}
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>

                <div class="card col-lg">
                    <div class="card-header bg-white">
                        <i class="fa fa-table"></i> All Roles <a class="btn btn-primary" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Add new role</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive m-t-35">
                            <table class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="70%">Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" value="{{$i = 0}}">
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if($role->name != "Super-Admin")
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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

