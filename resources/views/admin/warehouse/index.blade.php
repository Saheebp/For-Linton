@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Warehouse
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
                        General Warehouse
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
                            <a href="#">Warehouse</a>
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
                                                @role('Super User|Level 1|Level 2|Level 3')
                                                <!-- <button class="btn btn-sm btn-raised m-t-2 btn-success adv_cust_mod_btn"
                                                        data-toggle="modal" data-target="#createInventory">Create Inventory
                                                </button> -->
                                                @endrole

                                                @can('inventory.item.create')
                                                <button class="btn btn-sm btn-raised m-t-2 btn-warning adv_cust_mod_btn"
                                                        data-toggle="modal" data-target="#createItem">Add New Item
                                                </button>
                                                @endcan
                                                
                                                <div class="modal fade" id="createItem" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Create A New Item</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>

                                                            <form class="form-horizontal" action="{{ route('warehouseitem.store') }}" method="POST">
                                                                @csrf
                                                                <fieldset>
                                                                <div class="modal-body">
                                                                    
                                                                    <!-- Name input-->
                                                                    <div class="form-group row m-t-25">
                                                                        <div class="col-lg-12">
                                                                            <label for="date" class="col-form-label">
                                                                                Product Name
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
                                                                        <div class="col-lg-6">
                                                                            <label for="date" class="col-form-label">
                                                                                Quantity
                                                                            </label>
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                                <input type="number" class="form-control" id="name" placeholder="" name="quantity">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <label for="date" class="col-form-label">
                                                                                Threshhold
                                                                            </label>
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>
                                                                                <input type="number" class="form-control" id="name" placeholder="" name="threshold">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group row m-t-25">
                                                                        <div class="col-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Description
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <textarea type="text" name="description" id="subject1" class="form-control" placeholder="Subject"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row m-t-25">

                                                                        <div class="col-lg-6">
                                                                            <label for="subject1" class="col-form-label">
                                                                            Category
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <select class="form-control" name="category" required>
                                                                                    <option value="">-- Select Category --</option>
                                                                                    @foreach ($categories as $category)
                                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                        
                                                                        <div class="col-lg-6">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Batch
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <select class="form-control" name="batch" required>
                                                                                    <option value="">-- Select Batch --</option>
                                                                                    @foreach ($batches as $batch)
                                                                                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                                                                    @endforeach
                                                                                </select>
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
                            <i class="fa fa-table"></i> All Warehouse Items
                        </div>

                        <div class="card-body m-t-35">
                            
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-1 text-left">

                                    @can('inventory.item.create')
                                    <button class="btn btn-sm btn-raised m-t-2 btn-primary adv_cust_mod_btn"
                                            data-toggle="modal" data-target="#createItem">New Warehouse Item
                                    </button>
                                    @endcan

                                    <div class="modal fade" id="createItem" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modalLabel">Create New Warehouse Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="form-horizontal" action="{{ route('warehouseitem.store') }}" method="POST">
                                                    @csrf
                                                    <fieldset>
                                                    <div class="modal-body">
                                                        <!-- Name input-->
                                                        <div class="form-group row m-t-25">
                                                            <div class="col-lg-12">
                                                                <label for="name" class="col-form-label">
                                                                    Name
                                                                </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-file"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="name" placeholder="" name="name">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="quantity" class="col-form-label">
                                                                    Quantity
                                                                </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-file"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="quantity" placeholder="" name="quantity">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="threshold" class="col-form-label">
                                                                Threshold
                                                                </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-file"></i>
                                                                    </span>
                                                                    <input type="number" class="form-control" id="threshold" placeholder="" name="threshold">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="form-group row m-t-25">
                                                            <div class="col-lg-6">
                                                                <label for="quantity" class="col-form-label">
                                                                    Batch
                                                                </label>
                                                                <div class="input-group">
                                                                    <select class="form-control" name="batch" required>
                                                                        <option value="">-- Select Batch --</option>
                                                                        @foreach ($batches as $batch)                                                                                                    
                                                                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="Threshhold" class="col-form-label">
                                                                    Category
                                                                </label>
                                                                <div class="input-group">
                                                                    <select class="form-control" name="category" required>
                                                                        <option value="">-- Select Category --</option>
                                                                        @foreach ($categories as $category)                                                                                                    
                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row m-t-25">
                                                            <div class="col-12">
                                                                <label for="subject1" class="col-form-label">
                                                                    Description
                                                                </label>
                                                                <div class="input-group">
                                                                    <textarea type="text" name="description" id="subject1" class="form-control" placeholder="Subject"></textarea>
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

                                <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                    <form method="POST" action="{{ route('warehouse.search') }}">
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
                                            <th style="width:30%;">Name</th>
                                            <th style="width:3%;">Item&nbsp;ID</th>
                                            <th style="width:3%;">Batch&nbsp;ID</th>
                                            <th style="width:5%;">Quantity</th>
                                            <th style="width:5%;">Available</th>
                                            <th style="width:5%;">Status</th>
                                            <th style="width:20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>WH{{ $item->id }}</td>
                                            <td>{{ $item->batch->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->available }}</td>
                                            <td><span class="badge badge-{{ $item->status->style }}">{{ $item->status->name }}</span></td>
                                            <td>
                                                @can('inventory.item.disburse')
                                                <a class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#allocateProject{{ $item->id }}">Disburse</a>
                                                @endcan

                                                @can('inventory.item.delete')
                                                <a class="btn btn-sm btn-outline-danger text-right" data-toggle="modal" data-target="#modalDelete{{ $item->id }}">Delete</a>
                                                @endcan

                                                @can('inventory.item.history')
                                                <a class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#modalHistory{{ $item->id }}">History</a>
                                                @endcan

                                                @can('inventory.item.update')
                                                <a class="btn btn-outline-warning btn-sm text-right" data-toggle="modal" data-target="#modalDetails{{$item->id}}">Manage Item</a>&nbsp;&nbsp;
                                                @endcan
                                                
                                                <div class="modal fade" id="modalDetails{{$item->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary"> Manage Details for : <br>{{ $item->name }}</h4>
                                                            </div>

                                                            <form method="POST" action="{{ route('warehouseitem.update', $item->id) }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <p class="p-2">
                                                                    <table width="100%">
                                                                        <input value="{{ $item->id }}" name="id" hidden readonly >
                                                                        <tr>
                                                                            <td><b>Name:</b></td>
                                                                            <td><input type="text" class="form-control" min="1" value="{{$item->name}}" name="name" required></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td><b>Available Qty:</b></td>
                                                                            <td><input type="number" step="1" id="quantity" class="form-control" min="1" value="{{ $item->quantity }}" name="quantity" required></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Category:</b></td>
                                                                            <td>
                                                                                <select class="form-control" name="category" required>
                                                                                    <option value="">-- Select Category --</option>
                                                                                    @foreach ($categories as $category)                                                                                                    
                                                                                    <option @if($category->id == $item->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Batch:</b></td>
                                                                            <td>
                                                                                <select class="form-control" name="batch" required>
                                                                                    <option value="">-- Select Batch --</option>
                                                                                    @foreach ($batches as $batch)                                                                                                    
                                                                                    <option @if($batch->id == $item->batch_id) selected @endif value="{{ $batch->id }}">{{ $batch->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Item Status:</b></td>
                                                                            <td>
                                                                                <select class="form-control" name="status" required>
                                                                                    <option value="">-- Select Status --</option>
                                                                                    <option @if($item->status_id == $available) selected @endif value="{{ $available }}">Available</option>
                                                                                    <option @if($item->status_id == $unavailable) selected @endif value="{{ $unavailable }}">Unavailable</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </p>
                                                            </div> 
                                                            
                                                            <div class="modal-footer container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        
                                                                        <button class="btn btn-sm btn-white text-dark mt-1" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                                                                        <button class="btn btn-sm btn-warning text-white mt-1" type="submit">Save Changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modalDelete{{$item->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
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

                                                <div class="modal fade" id="allocateProject{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Allocate {{$item->name}} to a Project</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="form-horizontal" action="{{ route('warehouseitem.allocate.preview') }}" method="POST">
                                                            @csrf
                                                                <fieldset>
                                                                    <div class="modal-body">
                                                                        
                                                                        <input value="{{ $item->id }}" name="item" hidden readonly>
                                                                        
                                                                        <div class="col-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Allocate to a Project
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <select class="form-control col-12" name="project">
                                                                                    <option value=""> -- Select Project --</option>
                                                                                    @foreach($projects as $project)
                                                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Quantity
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <input type="number" step="1" id="quantity" class="form-control" min="1" max="{{$item->available}}" value="{{$item->available}}" name="quantity" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12">
                                                                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Allocate</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modalHistory{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Item History : {{$item->name}}</h4>
                                                                <p class="p-2">
                                                            </div>
                                                            

                                                            <div class="modal-body">

                                                                <table id="example1" class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width:10%;">Action </th>
                                                                            <th style="width:40%;">Disburser</th>
                                                                            <th style="width:40%;">Receiver</th>
                                                                            <th style="width:10%;">Quantity</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($item->activities as $activity)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $activity->type}}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $activity->user->name ?? '' }}<br>
                                                                                    <tag style="font-size:10px;">{{ $activity->created_at }}</tag>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $activity->project ?? '' }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $activity->quantity ?? '' }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            
                            <div style="text-align: right; width:100%;">{{ $items->links() }}</div>
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