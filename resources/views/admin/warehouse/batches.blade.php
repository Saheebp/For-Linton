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
                            <a href="#">Batches</a>
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
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Batches {{ isset($title) ? $title:'' }}
                        </div>

                        <div class="card-body m-t-35">
                            
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-1 text-left">
                                @role('Super User|Level 1|Level 2|Level 3')
                                <button class="btn btn-sm btn-raised m-t-2 btn-secondary adv_cust_mod_btn"
                                        data-toggle="modal" data-target="#createBatch">New Batch
                                </button>
                                @endrole

                                <div class="modal fade" id="createBatch" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Create New Batch</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="form-horizontal" action="{{ route('batches.store') }}" method="POST">
                                                @csrf
                                                <fieldset>
                                                <div class="modal-body">
                                                    
                                                    <!-- Name input-->
                                                    <div class="form-group row m-t-25">
                                                        <div class="col-lg-12">
                                                            <label for="batch" class="col-form-label">
                                                                Batch Number
                                                            </label>
                                                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                                <input type="text" class="form-control" id="name" name="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <button class="btn  btn-secondary" data-dismiss="modal">Close me!</button>
                                                            <button class="btn btn-responsive layout_btn_prevent btn-primary">Save & Create</button>
                                                            
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
                                    <form method="POST" action="{{ route('batches.search') }}">
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
                                            <!-- <th style="width:3%;">ID</th> -->
                                            <th style="width:20%;">Name</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($batches as $batch)
                                        <tr>
                                            <!-- <td>{{ $batch->id }}</td> -->
                                            <td>{{ $batch->name }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-danger text-danger text-white mt-1" data-toggle="modal" data-target="#modalDelete{{$batch->id}}">Delete</a>&nbsp;&nbsp;
                                                <a class="btn btn-outline-primary text-primary btn-sm text-white" data-toggle="modal" data-target="#modalDetails{{$batch->id}}">Update</a>&nbsp;&nbsp;
                                                    
                              
                                                <div class="modal fade" id="modalDelete{{$batch->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $batch->name }}</h4>
                                                            </div>
                                                            <form method="POST" action="{{ route('batches.delete') }}">
                                                            @csrf

                                                            <input value="{{ $batch->id }}" name="id" hidden readonly >
                                                            <div class="modal-body">
                                                                <h3 class="p-5 text-center">
                                                                    Are you sure you want to Delete this item?
                                                                </h3>
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-sm btn-danger" type="submit">Yes, Delete Batch</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modalDetails{{$batch->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary"> Manage Details for : <br>{{ $batch->name }}</h4>
                                                            </div>

                                                            <form method="POST" action="{{ route('batches.update', $batch->id) }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <p class="p-2">
                                                                    <table width="100%">
                                                                        <input value="{{ $batch->id }}" name="id" hidden readonly >
                                                                        <tr>
                                                                            <td><b>Name:</b></td>
                                                                            <td><input type="text" class="form-control" min="1" value="{{$batch->name}}" name="name" required></td>
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



                                                <div class="modal fade" id="modalDetails{{$batch->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Batch</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                        
                                                                <!-- Name input-->
                                                                <div class="form-group row m-t-25">
                                                                    <div class="col-lg-12">
                                                                        <label for="date" class="col-form-label">
                                                                            Name
                                                                        </label>
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </span>
                                                                            <input type="text" class="form-control" id="name" value="{{ $batch->name }}" name="name">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="form-group row m-t-25">
                                                                    <div class="col-lg-12">
                                                                        <label for="date" class="col-form-label">
                                                                            Description
                                                                        </label>
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </span>
                                                                            <input type="text" class="form-control" id="name" value="{{ $batch->description }}" name="description">
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            
                                                            <div class="modal-footer container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        
                                                                        <button class="btn btn-sm btn-white text-dark mt-1" data-dismiss="modal">Close</button>
                                                                        <button class="btn btn-sm btn-responsive mt-1 layout_btn_prevent btn-primary">Save Changes</button>
                                                                        
                                                                    </div>
                                                                </div>
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
                            
                            <div style="text-align: right; width:100%;">{{ $batches->links() }}</div>
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