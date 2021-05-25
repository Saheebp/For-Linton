@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Procurement
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
                        Procurements
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
                            <a href="#"> Request </a>
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
                                <button class="btn btn-sm btn-secondary align-right mt-1" data-toggle="modal" data-target="#manageRequest">Manage Request</button>

                                <div class="modal fade" id="manageRequest" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Update Status of Request</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('requests.update', $request) }}" method="POST">
                                            @csrf
                                            <fieldset>
                                            <div class="modal-body">
                                                
                                                <input type="text" name="request_id" value="{{ $request->id }}" hidden readonly>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <!-- <label for="subject1" class="col-form-label">
                                                            Trip Status
                                                        </label> -->
                                                        <div class="input-group">
                                                        <select class="form-control" name="status_id" required>
                                                            <option value="">-- Select Status --</option>
                                                            <option value="{{ $pending }}">In Progress</option>
                                                            <option value="{{ $queried }}">Queried</option>
                                                            <option value="{{ $completed }}">Completed</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-responsive layout_btn_prevent btn-primary">Submit</button>
                                                        <button class="btn  btn-secondary" data-dismiss="modal">Close me!</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endrole
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Request for Quotation
                        </div>
                        <div class="card-body m-t-35">
                            <h3><tag class="text-capitalize text-success">{{ $request->name ?? '' }}</tag></h3>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><b>Subject: </b><br><tag class="text-success">{{ $request->description ?? '' }}</tag> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Description: </b><br><tag class="text-success">{{ $request->description ?? '' }}</tag> </td>
                                            </tr>
                                            <tr>
                                                <td><b>Start Date: </b><br><span>{{ $request->start ?? '' }}</span></td>
                                                <td><b>End Date: </b><br>{{ $request->end ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Department: </b><br>{{ $request->department->name }}</td>
                                                <td><b>Status: </b><br><span class="badge badge-{{ $request->status->style }}">{{ $request->status->name ?? '' }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    <ul class="nav nav-tabs card-header-tabs float-left">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab1" data-toggle="tab">Quotations</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab2" data-toggle="tab">Contractors</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab3" data-toggle="tab">Resources</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab4" data-toggle="tab">Summary</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-2 ">
                                    <div class="tab-content text-justify" style="padding-top:30px;">
                                        
                                        <div class="tab-pane p-3 " id="tab1">
                                            <h4 class="card-title">Quotations/Submissions</h4>
                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            <table id="example1" class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;">SNo</th>
                                                        <th style="width:35%;">Name </th>
                                                        <th style="width:35%;">Phone </th>
                                                        <th style="width:20%;">Address </th>
                                                        <th style="width:20%;" colspan="3" class="text-right"> &nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($request->quotes as $quote)
                                                    <tr>
                                                        <td class="text-left">
                                                            {{ $i }}
                                                        </td>

                                                        <td class="text-left">
                                                            {{ $quote->contractor->name ?? '' }}
                                                        </td>

                                                        <td class="text-left">
                                                            {{ $quote->contractor->phone ?? '' }}
                                                        </td>

                                                        <td class="text-left">
                                                            {{ $quote->contractor->address ?? '' }}
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#comment{{ $quote->id }}">Comment</button>
                                                            <div class="modal fade" id="comment{{ $quote->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                            aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="modalLabel">Comment {{$task->name}}</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <form class="form-horizontal" action="#" method="POST">
                                                                        @csrf
                                                                            <fieldset>
                                                                                <div class="modal-body">
                                                                                    
                                                                                    <div class="col-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Message
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <textarea id="message" value="{{ old('message') }}" class="form-control" placeholder="" name="message"></textarea>
                                                                                        </div>
                                                                                        @error('message')
                                                                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-12">
                                                                                            <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Send</button>
                                                                                            <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i=$i+1; ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane p-3 active" id="tab2">
                                            <h4 class="card-title m-b-3">Contractors</h4>
                                            

                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <div class="m-t-10 accordian_alignment">
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    <table id="example1" class="table table-striped table-bordered bordered">
                                                        <tbody>
                                                            @foreach($request->contractors as $contractor)
                                                                <tr>
                                                                    <td class="text-left">
                                                                        {{ $contractor->name ?? '' }}
                                                                    <td>
                                                                    <td style="width:20%;">
                                                                        {{ $contractor->phone ?? '' }}
                                                                    </td>
                                                                    <td style="width:20%;">
                                                                        {{ $contractor->address ?? '' }}
                                                                    </td>
                                                                    <td style="width:5%;">
                                                                        <a class="btn btn-sm btn-success" href="#"> Manage</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane p-3" id="tab3">
                                            <h4 class="card-title">Resources</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <button class="btn btn-raised btn-sm btn-secondary mt-3 mb-3 adv_cust_mod_btn"
                                                data-toggle="modal" data-target="#modalUploadResource">Upload Resource
                                            </button>
                                            
                                            <div class="modal fade" id="modalUploadResource" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-header bg-secondary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Upload Resources</h4>
                                                        </div>
                                                        <form class="form-horizontal" action="{{ route('requests.upload', $request)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                            <fieldset>
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group mb-1">
                                                                                <input class="form-control col-12" type="file" name="file">
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <div class="col-lg-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                File Name
                                                                            </label>
                                                                            <div class="input-group mb-1">
                                                                                <input class="form-control col-12" type="text" name="name">
                                                                            </div>
                                                                        </div>
                                                            
                                                                        <div class="col-lg-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                File Description
                                                                            </label>
                                                                            <div class="input-group mb-1">
                                                                                <input class="form-control col-12" type="text" name="description">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Upload & Save</button>
                                                                            <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="example1" class="table table-striped table-bordered bordered">
                                                <tbody>
                                                    @foreach($request->resources as $resource)
                                                        <tr>
                                                            <td class="text-left">
                                                                {{ $resource->type ?? '' }}
                                                            <td>
                                                            <td style="width:20%;">
                                                                {{ $resource->name ?? '' }}
                                                            </td>
                                                            <td style="width:20%;">
                                                                {{ $resource->url ?? '' }}
                                                            </td>
                                                            <td style="width:5%;">
                                                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-download"></i> Download</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane p-3" id="tab4">
                                            <h4 class="card-title">Summary</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->


                                        </div>

                                    </div>
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
