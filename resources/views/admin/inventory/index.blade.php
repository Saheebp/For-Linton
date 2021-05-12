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
                        <i class="fa fa-book"></i>
                        Products
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
                            <a href="#">Inventories</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    <div class="outer">
        <div class="inner bg-container">
        <div class="row widget_countup">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="top_widget1">
                        <!-- <div class="front">
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="user_font">Customers</div>
                                <div id="widget_countup1">3,250</div>
                                <div class="tag-white">
                                    <span id="percent_count1">85</span>%
                                </div>
                                <div class="previous_font">Yearly Users stats</div>
                            </div>
                        </div> -->
                        <!-- <div class="">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5">
                                        <i class="fa fa-users text-dark"></i>
                                    </div>
                                    <div id="widget_countup12">{{ 0 ?? "" }}</div>
                                    <div>Available Products</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="visitsspark-chart" class="spark_line"></span>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">
                        <!-- <div class="front">
                            <div class="bg-success p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="user_font">Income</div>
                                <div id="widget_countup2">1,140</div>
                                <div class="tag-white">
                                    <span id="percent_count2">60</span>%
                                </div>
                                <div class="previous_font">Sales per month</div>
                            </div>
                        </div> -->

                        <!-- <div class="">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-primary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div id="widget_countup22">{{ 0 ?? ""}}</div>
                                    <div>Deactivated Products</div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="salesspark-chart" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget3">
                        <!-- <div class="front">
                            <div class="bg-warning p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="user_font">Bookings</div>
                                <div id="widget_countup3">85</div>
                                <div class="tag-white ">
                                    <span id="percent_count3">30</span>%
                                </div>
                                <div class="previous_font">Monthly comments</div>
                            </div>
                        </div> -->

                        <!-- <div class="">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-warning">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div id="widget_countup32">{{ 0 ?? "" }}</div>
                                    <div>Pending Request</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="mousespeed" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget4">
                        <!-- <div class="front">
                            <div class="bg-danger p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="user_font">Rating</div>
                                <div id="widget_countup4">8</div>
                                <div class="tag-white">
                                    <span id="percent_count4">80</span>%
                                </div>
                                <div class="previous_font">This month ratings </div>
                            </div>
                        </div> -->

                        <!-- <div class="">
                            <div class="bg-white section_border b_r_5">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>

                                    <div id="widget_countup42">{{ 0 ?? ""}}</div>
                                    <div>Completed Orders</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="rating" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

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
                                                @role('SuperUser|Director|Admin')
                                                <button class="btn btn-sm btn-raised m-t-2 btn-success adv_cust_mod_btn"
                                                        data-toggle="modal" data-target="#createInventory">Create New Inventory
                                                </button>
                                                @endrole

                                                <div class="modal fade" id="createInventory" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Create A New Inventory</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="form-horizontal" action="{{ route('inventory.store') }}" method="POST">
                                                                @csrf
                                                                <fieldset>
                                                                <div class="modal-body">
                                                                    
                                                                    <!-- Name input-->
                                                                    <div class="form-group row m-t-25">
                                                                        <div class="col-lg-12">
                                                                            <label for="date" class="col-form-label">
                                                                                Inventory Name
                                                                            </label>
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                                <input type="text" class="form-control" id="name" placeholder="" name="name">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group row m-t-25">
                                                                        <div class="col-lg-12">
                                                                            <label for="date" class="col-form-label">
                                                                                Related Project
                                                                            </label>
                                                                            <select class="form-control mb-3" name="project" required>
                                                                                <option value="">--Select Project--</option>
                                                                                @foreach($projects as $project)
                                                                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <div class="col-lg-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Description
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <textarea  type="text" class="form-control" id="description" placeholder="" name="description">
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <button class="btn btn-responsive layout_btn_prevent btn-primary">Save & Create</button>
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
                            <i class="fa fa-table"></i> All Inventories {{ isset($title) ? $title:'' }}
                        </div>

                        <div class="card-body m-t-35">
                            
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                </div>

                                <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                    <form method="POST" action="{{ route('inventory.search') }}">
                                    @csrf

                                        <input class="form-control col-12" type="hidden" name="filtertype" value="search">
                                        
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="text" name="data">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Records</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">ID</th>
                                            <th style="width:20%;">Name</th>
                                            <th style="width:10%;">Project</th>
                                            <th style="width:10%;">Created</th>
                                            <th style="width:5%;">Status</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->id }}</td>
                                            <td>{{ $inventory->name }}</td>
                                            <td>{{ $inventory->project->name }}</td>
                                            <td>{{ $inventory->created_at }}</td>
                                            <td><span class="badge badge-{{ $inventory->status->style }}">{{ $inventory->status->name }}</span></td>
                                            <td><a class="btn btn-secondary btn-sm text-white" href="{{ route('inventory.show', $inventory->id) }}">Manage</a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            
                            <div style="text-align: right; width:100%;">{{ $inventories->links() }}</div>
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