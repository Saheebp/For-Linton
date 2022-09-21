@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Permissions
    @parent
@stop

@section('header_styles')
    <!--Plugin styles-->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/dataTables.bootstrap.css')}}" /> -->
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/pages/tables.css')}}" /> -->
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
                        <i class="fa fa-road"></i>
                        Permissions
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
                            <a href="#"> Permissions </a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
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
                    
                    <div class="card m-t-35">

                    
                        <div class="card-body text-right p-2">
                            @foreach($roles as $role)
                            <a class="btn btn-sm btn-outline-dark float-center @if($role_name == $role->name) active @endif" href="{{ route('permissions.showpermission', $role->id) }}">{{ $role->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    @if($role_name != null)
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Permissions on this Role 
                            : <tag class="text-danger">{{ ($role_name == null) ? '' : $role_name }}</tag>
                        </div>
                        
                        <div class="card-body m-t-35">
                            <div class="table-responsive m-t-3">
                                <form class="form-horizontal" action="{{ route('permissions.syncrolepermissions') }}" method="POST">
                                    @csrf

                                    @can('permissions.manage')
                                    <button class="btn btn-success m-3 float-right" type="submit">Sync Permissions</button>
                                    @endcan
                                    
                                    <input name="role_id" value="{{ $role_id }}" hidden>
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th>Name</th>
                                            <th style="width:5%;">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tag type="hidden" value="{{ $i=1 }}" >
                                            @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{ $i++."."}}</td>
                                                <td>{{ $permission['name'] }} </td>
                                                <td><input name="permissions[]" value="{{ $permission['name'] }}" type="checkbox" {{ $permission['status'] }} ></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @can('permissions.manage')
                                    <button class="btn btn-success m-3 float-right" type="submit">Sync Permissions</button>
                                    @endcan
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
    <!-- /.content -->
@stop


@section('footer_scripts')
    <!--plugin scripts-->
    <script type="text/javascript" src="{{asset('vendors/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pluginjs/dataTables.tableTools.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.colReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('js/pages/simple_datatables.js')}}"></script>
    <!-- end of global scripts-->
@stop