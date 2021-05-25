@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Waere House
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
                        Ware House
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
                            <a href="#"> Allocate </a>
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
                        
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Project Information
                        </div>
                        <div class="card-body m-t-35">
                            <h3><tag class="text-capitalize text-success">{{ $project->name ?? '' }}</tag></h3>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <!-- <tr><td><b>Project ID: </b></td><td>{{ $project->id }}</td></tr> -->
                                            <tr>
                                                <td><b>Title: </b><br><tag class="text-success">{{ $project->name ?? '' }}</tag> </td>
                                                <td><b>Budget: </b><br><tag class="text-danger">{{ $project->budget ?? '' }}</tag></td>
                                            </tr>
                                            <tr>
                                                <td><b>State: </b><br><span>{{ $project->state ?? '' }}</span></td>
                                                <td><b>L.G.A: </b><br>{{ $project->lga ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Owner: </b><br>{{ $project->sponsor_name }}</td>
                                                <td><b>Project Type: </b><br>{{ $project->type }} days</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <!-- <tr><td><b>Project ID: </b></td><td>{{ $project->id }}</td></tr> -->
                                            <tr>
                                                <td><b>Item: </b><br><tag>{{ $item->name ?? '' }}</tag> </td>
                                                <td><b>Category: </b><br><tag>{{ $item->category->name ?? '' }}</tag></td>
                                            </tr>
                                            <tr>
                                                <td><b>Batch: </b><br>{{ $item->batch->name ?? '' }}</td>
                                                <td><b>Quantity: </b><br>{{ $quantity ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Officer </b><br>{{ Auth::user()->name }}</td>
                                                <td><b>Date: </b><br></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <form action="{{ route('warehouseitem.allocate.save') }}" method="POST">
                                    @csrf
                                        <input name="project" value="{{ $project->id }}" hidden readonly>
                                        <input name="item" value="{{ $item->id }}" hidden readonly>
                                        <input name="quantity" value="{{ $quantity }}" hidden readonly>
                                        <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Allocate</button>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('warehouse.index') }}">Cancel</a>
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
