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
                        <i class="fa fa-book"></i>
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

                    <div class="card">
                        <div class="card-body m-t-35">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="button_section_align">
                                        <!-- <h5>Glow Buttons</h5> -->
                                        <div class="row">
                                            
                                            <div class="col-lg-4 col-sm-12 m-t-15 text-left">
                                                
                                            @role('SuperUser|Director')
                                                <button class="btn btn-raised btn-success adv_cust_mod_btn"
                                                        data-toggle="modal" data-target="#modalCreate">Create New User
                                                </button>
                                                @endrole

                                                <div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">New User Details</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="p-2">
                                                                <form method="POST" action="{{ route('users.store') }}">
                                                                @csrf
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
                                                                
                                                                </p>
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-md btn-success" type="submit">Save Changes</button>
                                                                <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-4 col-sm-12 m-t-15 text-right">
                                               
                                            </div>

                                            <div class="col-lg-4 col-sm-12 m-t-15 text-right">
                                                <form method="POST" action="{{ route('users.search') }}">
                                                @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="text" name="data">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Users</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Users
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:30%;">Name</th>
                                            <th style="width:15%;">Email</th>
                                            <th style="width:10%;">Phone</th>
                                            <th style="width:10%;">Designation</th>
                                            <!-- <th style="width:5%;">Status</th> -->
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{!! str_replace( array('"','[',']'), ' ', $user->roles->pluck('name')) !!}</td>
                                            <!-- <td><span class="badge badge-{{ $user->status->style }}">{{ $user->status->name }}</span></td> -->
                                            <td>
                                                <a class="btn btn-secondary btn-sm text-white" href="{{ route('users.show', $user->id) }}">Manage User</a>
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