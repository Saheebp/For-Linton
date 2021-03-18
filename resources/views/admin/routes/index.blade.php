@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Routes
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
                            <a href="#"> Routes </a>
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
                                            <div class="col-12 m-t-15">
                                                <button class="btn btn-raised btn-secondary adv_cust_mod_btn"
                                                    data-toggle="modal" data-target="#createTrip">Create New Route
                                                </button>
                                                
                                                <div class="modal fade" id="createTrip" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Create A New Route</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="form-horizontal" action="{{ route('routes.store')}}" method="POST">
                                                            @csrf
                                                            <fieldset>
                                                            <div class="modal-body">
                                                                
                                                                <!-- Name input-->
                                                                <div class="form-group row m-t-25">
                                                                    <div class="col-lg-12">
                                                                        <label for="date" class="col-form-label">
                                                                            Origin
                                                                        </label>
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </span>
                                                                        <input type="text" class="form-control" id="origin" placeholder="Origin" name="origin">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-lg-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Destination
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-map-marker"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control" id="destination" placeholder="Destination" name="destination">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="form-group row">
                                                                    <div class="col-lg-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Amount
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-money"></i>
                                                                            </span>
                                                                            <input type="number" id="amount" class="form-control" placeholder="Amount" name="amount">
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-12">
                                                                        <button class="btn btn-responsive layout_btn_prevent btn-primary">Save & Create Route</button>
                                                                        <button class="btn  btn-secondary" data-dismiss="modal">Close me!</button>
                                                                    </div>
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
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Routes
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:5%;">#</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <!-- <th style="width:15%;">Fee</th> -->
                                        <th style="width:15%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tag type="hidden" value="{{ $i=1 }}" >
                                        @foreach($routes as $route)
                                        <tr>
                                            <td>{{ $i++."."}}</td>
                                            <td>{{ $route->origin }}</td>
                                            <td>{{ $route->destination }}</td>
                                            <!-- <td>&#8358;{{ number_format(floatval($route->amount), 2) }}</td> -->
                                            <td>
                                                <a class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modal-edit{{$route->id}}">Edit</a>&nbsp;&nbsp;
                                                <div class="modal fade" id="modal-edit{{$route->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                    <form action="{{ route('routes.edit' , $route)}}" method="POST">
                                                    @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white" id="modalLabelprimary">Edit Route</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <!-- Name input-->
                                                                <div class="form-group row m-t-25">
                                                                    <div class="col-lg-12">
                                                                        <label for="date" class="col-form-label">
                                                                            Origin
                                                                        </label>
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </span>
                                                                        <input type="text" class="form-control" id="origin" placeholder="Origin" name="origin">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-lg-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Destination
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-map-marker"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control" id="destination" placeholder="Destination" name="destination">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-success btn-sm text-white">Yes, Save Updates</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#modal-delete{{$route->id}}">Delete</a>&nbsp;&nbsp;
                                                <div class="modal fade" id="modal-delete{{$route->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                    <form action="{{ route('routes.destroy' , $route)}}" method="POST">
                                                    @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h4 class="modal-title text-white" id="modalLabelprimary">Delete Route</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <h4 align="center"> Are you sure you want to delete this?</h4>
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger btn-sm text-white">Yes, Delete Now</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
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