@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Inventory
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
                        <i class="fa fa-road"></i>
                        Inventory
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
                            <a href="#"> Inventory </a>
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success pt-0 pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger pt-0 pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card">
                        <div class="text-right p-3">

                            @role('SuperUser|Director|Admin')
                                <!-- <button class="btn btn-sm btn-secondary align-right mt-1" data-toggle="modal" data-target="#manageProject">Manage Project</button> -->

                            @endrole
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Project Information
                        </div>
                        <div class="card-body m-t-35">
                            <h3><tag class="text-capitalize text-success">{{ $project->name ?? '' }}</tag></h3>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><b>Title: </b><br><tag class="text-success">{{ $inventory->project->name ?? '' }}</tag> </td>
                                            </tr>
                                            <tr>
                                                <td><b>State: </b><br><span>{{ $inventory->project->state ?? '' }}</span>, {{ $inventory->project->lga ?? '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><b>Start: </b><br><tag class="text-success">{{ date('d M Y', strtotime($inventory->project->start)) }}</tag> </td>
                                                <td><b>End: </b><br><tag class="text-danger">{{ date('d M Y', strtotime($inventory->project->end)) }}</tag></td>
                                            </tr>
                                            <tr>
                                                <td><b>Project Status: </b><br><span class="badge badge-{{ $inventory->project->status->style }}">{{ $inventory->project->status->name ?? '' }}</span></td>
                                                <td><b>Manager: </b><br>{{ $inventory->project->manager->name ?? '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card-body m-t-35">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i> Inventory Items
                            </div>
                            <table class="table table-striped table-bordered bordered">
                                <thead>
                                    <tr>
                                        <th style="width:3%;">ID</th>
                                        <th style="width:20%;">Name</th>
                                        <th style="width:10%;">Category</th>
                                        <th style="width:5%;">Brand</th>
                                        <th style="width:5%;">Quantity</th>
                                        <th style="width:5%;">Available</th>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:5%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventory->items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->batch->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->available }}</td>
                                        <td><span class="badge badge-{{ $item->status->style }}">{{ $item->status->name }}</span></td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#modalDetails{{$item->id}}">Manage</a>&nbsp;&nbsp;
                                            
                                            <div class="modal fade" id="modalDetails{{$item->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary"> [Item ID: {{ $item->id }}]</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="p-2">
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td><b>Name:</b></td>
                                                                        <td>{{ $item->name }}</td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td><b>Available Qty:</b></td>
                                                                        <td>&#8358;{{ $item->quantity }}</td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td><b>Item Status:</b></td>
                                                                        <td><span class="text-{{ $item->status->style }}">{{ $item->status->name }}</span></td>
                                                                    </tr>
                                                                </table>
                                                            </p>
                                                        </div> 
                                                        
                                                        <div class="modal-footer container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    
                                                                    <a class="btn btn-sm btn-warning text-white mt-1" data-toggle="modal" data-target="#modalDelete{{$item->id}}">Delete</a>&nbsp;&nbsp;
                                                                    <button class="btn btn-sm btn-white text-dark mt-1" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalDelete{{$item->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $item->name }}</h4>
                                                        </div>
                                                        <form method="POST" action="{{ route('warehouseitem.destroy', $item) }}">
                                                        @csrf

                                                        <input value="{{ $item->id }}" name="id" hidden readonly >
                                                        <div class="modal-body">
                                                            <h3 class="p-5 text-center">
                                                                Are you sure you want to Delete this item?
                                                            </h3>
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-sm btn-danger" type="submit">Yes, Delete product</button>
                                                        </div>
                                                        </form>
                                                    </div>
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
