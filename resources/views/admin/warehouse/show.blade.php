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
                        Projects
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
                            <a href="#"> Project </a>
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
                            <h3><tag class="text-capitalize text-success">{{ $inventory->project->name ?? '' }}</tag></h3>
                            <table id="example1" class="display table table-stripped table-bordered">
                                <tbody>
                                    <!-- <tr><td><b>Project ID: </b></td><td>{{ $inventory->project->id }}</td></tr> -->
                                    <tr><td><b>Start Date: </b></td><td>{{ date('d M Y', strtotime($inventory->project->startdate)) }}</td></tr>
                                    <tr><td><b>Project Status: </b></td><td><span class="badge badge-{{ $inventory->project->status->style }}">{{ $inventory->project->status->name ?? '' }}</span></td></tr>
                                    <tr><td><b>Manager: </b></td><td>{{ $inventory->project->manager->name ?? '' }}</td></tr>
                                    <tr><td><b>Remaining Days: </b></td><td>{{ round(( strtotime($inventory->project->duedate) - strtotime($inventory->project->created_at)) / 3600 ) }} hours</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    <ul class="nav nav-tabs card-header-tabs float-left">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab1" data-toggle="tab">Inventory</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab2" data-toggle="tab">Requests</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab3" data-toggle="tab">Recent Activity</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-2 ">
                                    <div class="tab-content text-justify" style="padding-top:30px;">
                                        
                                        <div class="tab-pane p-3 active" id="tab1">
                                            <h4 class="card-title">Items in Inventory</h4>
                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <table id="example1" class="table table-striped table-bordered bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;">SNo</th>
                                                        <th style="width:40%;">Name </th>
                                                        <th style="width:15%;">Category</th>
                                                        <th style="width:15%;">Quantity</th>
                                                        <th style="width:5%;">Status</th>
                                                        <th style="width:5%;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($inventory->items as $item)
                                                        <tr>
                                                            <td>
                                                            {{ $i }}.
                                                            </td>
                                                            <td>
                                                                {{ $item->name}}
                                                            </td>
                                                            <td>
                                                                {{ $item->category->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->available_quantity ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->status->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                NA
                                                            </td>
                                                        </tr>
                                                        <?php $i=$i+1; ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane p-3" id="tab2">
                                            <h4 class="card-title m-b-3">Inventory Requests</h4>
                                            
                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <div class="m-t-10 accordian_alignment">
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    
                                                @foreach($inventory->requests as $request)
                                                    <div class="card mb-2">
                                                        <div class="card-header bg-white" role="tab" id="title-one">
                                                            <a class="collapsed accordion-section-title" data-toggle="collapse" data-parent="#accordion" href="#card-data-one{{$task->id}}" aria-expanded="false">
                                                                <div class="row"> 
                                                                    <div class="col-1"> <span class="float-left p-1 badge badge-{{ $task->status->style }}">{{ $task->status->name }}</span> </div>
                                                                    <div class="col-10"> {{ $task->order ?? ''}} {{ $task->name ?? ''}} </div>
                                                                    <div class="col-1"> <i class="fa fa-plus float-right m-t-5"></i> </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="card-data-one{{$task->id}}" class="card-collapse collapse">
                                                            <div class="card-body m-t-20">

                                                                <table class="table table-hover" style="width:100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <tag class="text-primary text-bold">Description :</tag>
                                                                                <p class="text-justify">
                                                                                    {{ $task->description ?? ''}}
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <tag class="text-primary text-bold">Depends on :</tag>
                                                                                <p class="text-justify">
                                                                                    {{ $project->tasks->where('preceedby', $task->preceedby)->first()->name ?? '' }}
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <tag class="text-primary text-bold">Resources :</tag>
                                                                                <p class="text-justify">
                                                                                    @if ($task->resources->count() != 0)
                                                                                    <table id="example1" class="table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Name</th>
                                                                                                <th style="width:10%;">Type</th>
                                                                                                <th style="width:60%;">Description </th>
                                                                                                <th style="width:15%;">Url</th>
                                                                                                <th style="width:15%;">Creator</th>
                                                                                                <th style="width:15%;">File</th>
                                                                                                <th style="width:5%;">Action</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($task->resources as $resource)
                                                                                                <tr>
                                                                                                    <td class="text-left">
                                                                                                        {{ $resource->name ?? '' }}
                                                                                                    <td>
                                                                                                    <td style="width:20%;">
                                                                                                        {{ $resource->type ?? '' }}
                                                                                                    </td>
                                                                                                    <td style="width:20%;">
                                                                                                        {{ $resource->description ?? '' }}
                                                                                                    </td>
                                                                                                    <td style="width:20%;">
                                                                                                        {{ $resource->url ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <img src="{{ asset($resource->url) }}" width="20px" class="message-img avatar" alt="avatar1">
                                                                                                    </td>
                                                                                                    <td style="width:5%;">
                                                                                                        <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                                                                                    </td>

                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                    @endif
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            <tag class="text-primary text-bold">Team :</tag>
                                                                                <p class="text-justify">
                                                                                    <?php $i = 1; ?>
                                                                                    @foreach($task->members as $member)
                                                                                        {{ $i }}. {{ $member->user->name  }} <a class="float-right text-white p-1 badge badge-danger">Remove</a><br>
                                                                                        <?php $i=$i+1; ?>
                                                                                    @endforeach
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <p class="p-2">
                                                                    <button class="btn btn-sm btn-outline-secondary float-right m-1" data-toggle="modal" data-target="#updateTask{{ $task->id }}">Update</button>
                                                                    <button class="btn btn-sm btn-outline-danger float-right m-1" data-toggle="modal" data-target="#removeTask{{ $task->id }}">Remove</button>
                                                                    <button class="btn btn-sm btn-outline-warning float-right m-1" data-toggle="modal" data-target="#addTaskMember{{ $task->id }}">Assign Member</button>
                                                                    <button class="btn btn-sm btn-outline-success float-right m-1" data-toggle="modal" data-target="#addTaskResource{{ $task->id }}">Add Resource</button>

                                                                    <div class="modal fade" id="addTaskMember{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Add Member to Task</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">??</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form class="form-horizontal" action="{{ route('tasks.addMember', $task)}}" method="POST">
                                                                                @csrf
                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                        
                                                                                        <input type="text" name="task_id" value="{{ $task->id }}" hidden readonly>
                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Select New Team Member
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                <select class="form-control" name="member" required>
                                                                                                    <option value="">-- Select Member --</option>
                                                                                                    @foreach ($members as $member)                                                                                                    
                                                                                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Submit</button>
                                                                                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal fade" id="addTaskResource{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Add Resource to Task</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">??</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form class="form-horizontal" action="{{ route('tasks.upload', $task)}}" method="POST" enctype="multipart/form-data">
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

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane p-3" id="tab3">
                                            <h4 class="card-title">Recent Activity</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                        </div>

                                        <div class="tab-pane p-3" id="tab4">
                                            <h4 class="card-title">Project Time line</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered bordered">
                                                    <tbody>
                                                        
                                                        <?php $i = 2; ?>
                                                        @foreach($project->tasks as $task)
                                                            @if ( $i % 2 == 0 )
                                                            <tr>
                                                                <td class="text-right" style="width:50%;">
                                                                    <span class="badge badge-{{$project->status->style }}">{{ $project->status->name }}</span><br>
                                                                    {{ $task->name ?? '' }}<br>
                                                                    {{ $task->description ?? '' }}<br>
                                                                    {{ 0 }}%</br>
                                                                <td>
                                                                <td style="width:50%;">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                            @else
                                                            <tr>
                                                                <td style="width:50%;">
                                                                    &nbsp;
                                                                </td>
                                                                <td class="text-left" style="width:50%;">
                                                                    <span class="badge badge-{{$project->status->style }}">{{ $project->status->name }}</span><br>
                                                                    {{ $task->name ?? '' }}<br>
                                                                    {{ $task->description ?? '' }}<br>
                                                                    {{ 0 }}%</br>
                                                                <td>
                                                            </tr>
                                                            @endif
                                                            <?php $i=$i+1; ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane p-3" id="tab5">
                                            <h4 class="card-title">Resources</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <table id="example1" class="table table-striped table-bordered bordered">
                                                <tbody>
                                                    @foreach($project->resources as $resource)
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
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane p-3" id="tab6">
                                            <h4 class="card-title">Budget Analysis</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <table id="example1" class="table table-striped table-bordered bordered">
                                                <tbody>
                                                    @foreach($project->resources as $resource)
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
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane p-3" id="tab7">
                                            <h4 class="card-title">Inventory</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <button class="btn btn-raised btn-sm btn-secondary mt-3 mb-3 adv_cust_mod_btn"
                                                data-toggle="modal" data-target="#modalItemCreate">Add New Item
                                            </button>
                                            
                                            <div class="modal fade" id="modalItemCreate" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-header bg-secondary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">New Item Details</h4>
                                                        </div>
                                                        <form method="POST" action="{{ route('items.store') }}">
                                                        @csrf
                                                            <div class="modal-body">

                                                                <input name="inventory_id" value="{{ $project->inventory->id }}" readonly>    
                                                                
                                                                <div class="form-group row">
                                                                    
                                                                    <div class="col-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Item Name
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="text" id="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" placeholder="" name="name">
                                                                        </div>
                                                                        @error('name')
                                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Available Quantity
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="number" id="available_quantity" value="{{ old('available_quantity') }}" class="form-control" min="0" name="available_quantity">
                                                                        </div>
                                                                        @error('available_quantity')
                                                                            <span class="text-danger">{{ $errors->first('available_quantity') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Threshold Quantity
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="number" id="threshold_quantity" value="{{ old('threshold_quantity') }}" class="form-control" min="0" name="threshold_quantity">
                                                                        </div>
                                                                        @error('threshold_quantity')
                                                                            <span class="text-danger">{{ $errors->first('threshold_quantity') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Batch Number
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="number" id="batch_number" value="{{ old('batch_number') }}" class="form-control" min="0" name="batch_number">
                                                                        </div>
                                                                        @error('batch_number')
                                                                            <span class="text-danger">{{ $errors->first('batch_number') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Description
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <textarea id="description" value="{{ old('description') }}" class="form-control" placeholder="" name="description"></textarea>
                                                                        </div>
                                                                        @error('description')
                                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Category
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <select class="form-control col-12" name="category">
                                                                                <option value=""> -- Select Category --</option>
                                                                                @foreach($categories as $category)
                                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        @error('category')
                                                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label for="subject1" class="col-form-label">
                                                                           Availability Status
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <select class="form-control col-12" name="status">
                                                                                <option value=""> -- Select Status --</option>
                                                                                @foreach($statuses as $status)
                                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        @error('status')
                                                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                    
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-success" type="submit">Save Changes</button>
                                                                <button class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="example1" class="table table-striped table-bordered bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;">ID</th>
                                                        <th style="width:40%;">Name </th>
                                                        <th style="width:15%;">Category</th>
                                                        <th style="width:15%;">Quantity</th>
                                                        <th style="width:5%;">Status</th>
                                                        <th style="width:5%;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($project->inventory->items as $item)
                                                        <tr>
                                                            <td>
                                                                {{ $item->id ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->name}}
                                                            </td>
                                                            <td>
                                                                {{ $item->category->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->available_quantity ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->status->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                NA
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
