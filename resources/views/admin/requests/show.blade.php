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
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('requests.update', $request) }}" method="POST">
                                            @csrf
                                            <fieldset>
                                            <div class="modal-body">
                                                
                                                <input type="text" name="request_fq_id" value="{{ $request->id }}" hidden readonly>
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
                            <h3><tag class="text-capitalize text-success">RFQ{{ $request->id }} : {{ $request->name ?? '' }}</tag></h3>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="example1" class="display table table-stripped">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><b>Subject: </b><br><tag class="">{{ $request->subject ?? '' }}</tag> </td>
                                                <td><b>Description: </b><br><tag class="">{{ $request->description ?? '' }}</tag> </td>
                                                <td><b>Maximum Cost: </b><br><tag class="">&#8358;{{ number_format(floatval($request->total_cost), 2) }}</tag> </td>
                                            </tr>
                                            <tr>
                                                <td><b>Open Date: </b><br><span>{{ $request->start ?? '' }}</span></td>
                                                <td><b>Closing Date: </b><br>{{ $request->end ?? '' }}</td>
                                            
                                                <td><b>Department: </b><br>{{ $request->department->name ?? '' }}</td>
                                                <td><b>Status: </b><br><span class="badge badge-{{ $request->status->style ?? 'default' }}">{{ $request->status->name ?? '' }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Submitted Quotations
                        </div>
                        <div class="card-body m-t-35">

                            <!-- <div class="row">
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.filter') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="date" name="date" placeholder="search by ref no, ">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Filter by Start Date</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.search') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="text" name="data">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Records</button></div>
                                                    <div class="input-group-append"><a class="btn btn-outline-dark" href="{{ route('payments.index') }}">Reset</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                            <div class="table-responsive">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:15%;">Cost</th>
                                            <th style="width:35%;">Name </th>
                                            <th style="width:20%;">Submission Date </th>
                                            <th style="width:5%;">Approval </th>
                                            <th style="width:5%;">Submission </th>
                                            <th style="width:20%;" class="text-center"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($request->quotes->where('status_id', $completed) as $quote)
                                        <tr @if($quote->total_cost > $request->total_cost) class="text-danger" @endif >
                                            
                                            <td class="text-left">
                                                &#8358;{{ number_format(floatval($quote->total_cost), 2) }}
                                            </td>
                                            
                                            <td style="">
                                                {{ $quote->user->org_name ?? '' }}
                                            </td>

                                            <td style="">
                                                {{ date('d M Y, h:ia', strtotime($quote->created_at)) }}
                                            </td>
                                            
                                            <td>
                                            @if ($quote->approval_status == 'Pending')
                                                <span class="badge badge-warning">{{ $quote->approval_status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $quote->approval_status }}</span>
                                            @endif
                                            </td>

                                            <td>
                                                <span class="badge badge-{{$quote->status->style }}">{{ $quote->status->name }}</span>
                                            </td>

                                            <td>
                                                @role('Level 1|Level 2|Level 3')
                                                    @if ($quote->requestFq->status_id != $closed)
                                                    <a class="btn btn-outline-warning btn-sm text-left" data-toggle="modal" data-target="#manageQuoteStatus{{$quote->id}}"><i class="fa fa-cogs"></i></a>&nbsp;&nbsp;
                                                    @endif
                                                    
                                                    <a class="btn btn-sm btn-outline-success text-left" href="{{ route('quotes.download', $quote->id)}}"><i class="fa fa-download"></i> </a>
                                                    <a class="btn btn-sm btn-outline-secondary text-left" href="{{ route('contractors.show', $quote->user_id)}}"><i class="fa fa-user"> View</i> </a>
                                                    
                                                    <div class="modal fade" id="manageQuoteStatus{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                    aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="modalLabel">Update Status of Quote</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">??</span>
                                                                    </button>
                                                                </div>
                                                                <form class="form-horizontal" action="{{ route('quotes.updateStatus', $quote)}}" method="POST">
                                                                @csrf
                                                                <fieldset>
                                                                <div class="modal-body">
                                                                    
                                                                    <input type="text" name="quote_id" value="{{ $quote->id }}" hidden readonly>
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <!-- <label for="subject1" class="col-form-label">
                                                                                Trip Status
                                                                            </label> -->
                                                                            <div class="input-group">
                                                                            <select class="form-control" name="approval" required>
                                                                                <option value="">-- Select Status --</option>
                                                                                <option value="Accepted">Accepted</option>
                                                                                <!-- <option value="{{ $queried }}">Queried</option>
                                                                                <option value="{{ $completed }}">Completed</option> -->
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
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Resources
                        </div>
                        <div class="card-body m-t-35">

                            <!-- <div class="row">
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.filter') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="date" name="date" placeholder="search by ref no, ">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Filter by Start Date</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.search') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="text" name="data">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Records</button></div>
                                                    <div class="input-group-append"><a class="btn btn-outline-dark" href="{{ route('payments.index') }}">Reset</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                            <div class="table-responsive">
                                <button class="btn btn-raised btn-sm btn-secondary mt-3 mb-3 adv_cust_mod_btn"
                                    data-toggle="modal" data-target="#modalUploadResource">Upload Resource
                                </button>
                                
                                <div class="modal fade" id="modalUploadResource" role="dialog" aria-labelledby="modalLabelprimary">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            
                                            <div class="modal-header bg-secondary">
                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Upload Resources</h4>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('requests.upload')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <fieldset>
                                                    <div class="modal-body">
                                                    
                                                        <input hidden readonly type="text" name="request_fq_id" value="{{$request->id}}">
                                                        <div class="form-group row">

                                                            <div class="col-lg-12">
                                                                <label for="subject1" class="col-form-label">
                                                                    Select File
                                                                </label>
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

                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">SNo</th>
                                            <th style="width:35%;">Name </th>
                                            <th style="width:35%;">Description </th>
                                            <th style="width:20%;">Type </th>
                                            <th style="width:20%;" colspan="1" class="text-left"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($request->resources as $resource)
                                        <tr>
                                            <td class="text-left">
                                                R{{ $resource->id }}
                                            </td>
                                            <td style="width:20%;">
                                                {{ $resource->name ?? '' }}
                                            </td>
                                            <td style="width:40%;">
                                                {{ $resource->description ?? '' }}
                                            </td>
                                            <td style="width:40%;">
                                                {{ $resource->type ?? '' }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('requests.download', $resource->id)}}"><i class="fa fa-download"></i> Download</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Contractors
                        </div>
                        <div class="card-body m-t-35">

                            <div class="row">
                                <div class="col-lg-6 col-sm-12 text-left">
                                    <button class="btn btn-raised btn-sm btn-secondary mt-3 mb-3 adv_cust_mod_btn"
                                        data-toggle="modal" data-target="#addContractor">Add Contractor
                                    </button>

                                    <div class="modal fade" id="addContractor" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modalLabel">Add Contractor to Request</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">??</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal" action="{{ route('requests.addContractor')}}" method="POST">
                                                @csrf
                                                <fieldset>
                                                    <div class="modal-body">
                                                        
                                                        <input type="text" name="request_fq_id" value="{{ $request->id }}" hidden readonly>
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label for="subject1" class="col-form-label">
                                                                    Select New Contractor
                                                                </label>
                                                                <div class="input-group">
                                                                <select class="form-control" name="contractor_id" required>
                                                                    <option value="">-- Select --</option>
                                                                    @foreach ($contractors as $contractor)                                                                                                    
                                                                    <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Save</button>
                                                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.search') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="text" name="data">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Records</button></div>
                                                    <div class="input-group-append"><a class="btn btn-outline-dark" href="{{ route('payments.index') }}">Reset</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
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
                                        @foreach ($request->quotes as $quote)
                                        <tr>
                                            <td class="text-left">
                                                N/A
                                            </td>
                                            <td style="width:20%;">
                                                {{ $quote->user->org_name ?? '' }}
                                            </td>
                                            <td style="width:40%;">
                                                {{ $quote->user->org_phone ?? '' }}
                                            </td>
                                            <td style="width:40%;">
                                                {{ $quote->user->org_address ?? '' }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-success float-right" data-toggle="modal" data-target="#viewContractor{{$contractor->id}}">remove</a>
                                                <div class="modal fade" id="viewContractor{{$contractor->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Details</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">??</span>
                                                                </button>
                                                            </div>

                                                            <table id="example1" class="table table-stripped">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:5%;">SNo</th>
                                                                        <th style="width:35%;">Name </th>
                                                                        <th style="width:35%;">Description </th>
                                                                        <th style="width:20%;">Type </th>
                                                                        <th style="width:20%;" colspan="1" class="text-left"> Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($request->resources as $resource)
                                                                    <tr>
                                                                        <td class="text-left">
                                                                            N/A
                                                                        </td>
                                                                        <td style="width:20%;">
                                                                            {{ $resource->name ?? '' }}
                                                                        </td>
                                                                        <td style="width:40%;">
                                                                            {{ $resource->description ?? '' }}
                                                                        </td>
                                                                        <td style="width:40%;">
                                                                            {{ $resource->type ?? '' }}
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn btn-sm btn-outline-secondary" href="{{ $quote->fileurl ?? '' }}"><i class="fa fa-download"></i> Download</a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            
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
