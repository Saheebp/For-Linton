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
                            <a href="#"> Procurement </a>
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
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('quoterequest.update', $project)}}" method="POST">
                                            @csrf
                                            <fieldset>
                                            <div class="modal-body">
                                                
                                                <input type="text" name="trip_id" value="{{ $project->id }}" hidden readonly>
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
                                                <td><b>Objective: </b><br><tag class="text-success">{{ $project->objective ?? '' }}</tag> </td>
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
                                                <td><b>Start: </b><br><tag class="text-success">{{ date('d M Y', strtotime($project->start)) }}</tag> </td>
                                                <td><b>End: </b><br><tag class="text-danger">{{ date('d M Y', strtotime($project->end)) }}</tag></td>
                                            </tr>
                                            <tr>
                                                <td><b>Project Status: </b><br><span class="badge badge-{{ $project->status->style }}">{{ $project->status->name ?? '' }}</span></td>
                                                <td><b>Manager: </b><br>{{ $project->manager->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Remaining Days: </b><br>{{ round(( strtotime($project->end) - strtotime($project->start)) / 3600 / 24 ) }} days</td>
                                                <td><b>&nbsp; </b><br>&nbsp;</td>
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
                                            <a class="nav-link" href="#tab1" data-toggle="tab">Team Members</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab2" data-toggle="tab">Project Tasks</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab3" data-toggle="tab">Recent Activity</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab4" data-toggle="tab">Timeline</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab5" data-toggle="tab">Project Resources</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab6" data-toggle="tab">Budget</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab7" data-toggle="tab">Inventory</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab8" data-toggle="tab">Messaging</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-2 ">
                                    <div class="tab-content text-justify" style="padding-top:30px;">
                                        
                                        <div class="tab-pane p-3 " id="tab1">
                                            <h4 class="card-title">Team Members</h4>
                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            <table id="example1" class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;">SNo</th>
                                                        <th style="width:35%;">Name </th>
                                                        <th style="width:20%;">Designation </th>
                                                        <th style="width:20%;" colspan="3" class="text-right"> &nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($project->members as $member)
                                                    <tr>
                                                        <td class="text-left">
                                                            {{ $i }}
                                                        </td>

                                                        <td class="text-left">
                                                            {{ $member->user->name ?? '' }}
                                                        </td>

                                                        <td class="text-left">
                                                            {{ $member->user->designation->name ?? '' }}
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#message{{ $member->id }}">Send Message</button>
                                                            <div class="modal fade" id="message{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                            aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="modalLabel">Message {{$member->name}}</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">??</span>
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
                                                        <td>
                                                            <button class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#message{{ $member->id }}">Change Role</button>
                                                            <div class="modal fade" id="message{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                            aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="modalLabel">Update {{$member->name}}</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">??</span>
                                                                            </button>
                                                                        </div>
                                                                        <form class="form-horizontal" action="#" method="POST">
                                                                        @csrf
                                                                            <fieldset>
                                                                                <div class="modal-body">
                                                                                    
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

                                                        <td>
                                                            <button class="btn btn-sm btn-outline-danger text-right" data-toggle="modal" data-target="#remove{{ $member->id }}">Remove</button>
                                                            <div class="modal fade" id="remove{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                            aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="modalLabel">Remove {{$member->name}}</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">??</span>
                                                                            </button>
                                                                        </div>
                                                                        <form class="form-horizontal" action="#" method="POST">
                                                                        @csrf
                                                                            <fieldset>
                                                                                <div class="modal-body">
                                                                                    
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-12">
                                                                                            <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Remove</button>
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
                                            <h4 class="card-title m-b-3">Project Tasks & Processes</h4>
                                            
                                            <button class="btn btn-raised btn-sm btn-secondary mt-3 mb-3 adv_cust_mod_btn"
                                                data-toggle="modal" data-target="#modalTaskCreate">Add New Task
                                            </button>
                                            
                                            <div class="modal fade" id="modalTaskCreate" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-header bg-secondary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">New Task Details</h4>
                                                        </div>
                                                        <form method="POST" action="{{ route('tasks.store') }}">
                                                            <div class="modal-body">

                                                                <input name="project_id" value="{{ $project->id }}" hidden readonly> 

                                                                @csrf
                                                                <div class="form-group row">
                                                                    
                                                                    <div class="col-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Task Name
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="text" id="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" placeholder="" name="name">
                                                                        </div>
                                                                        @error('name')
                                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    
                                                                    <div class="col-lg-6">
                                                                        <label End="subject1" class="col-form-label">
                                                                            Start Date
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="date" id="start" class="form-control" name="start" required>
                                                                        </div>
                                                                        @error('start')
                                                                            <span class="text-danger">{{ $errors->first('start') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label End="subject1" class="col-form-label">
                                                                            Due Date
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="date" id="duedate" class="form-control" name="duedate" required>
                                                                        </div>
                                                                        @error('duedate')
                                                                            <span class="text-danger">{{ $errors->first('duedate') }}</span>
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
                                                                            Depends on
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <select class="form-control col-12" name="preceedby">
                                                                                <option value=""> -- Select Task --</option>
                                                                                @foreach($project->tasks as $task)
                                                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        @error('preceedby')
                                                                            <span class="text-danger">{{ $errors->first('preceedby') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Budget
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="number" id="budget" value="{{ old('budget') }}" class="form-control" min="0" name="budget">
                                                                        </div>
                                                                        @error('budget')
                                                                            <span class="text-danger">{{ $errors->first('budget') }}</span>
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

                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <div class="m-t-10 accordian_alignment">
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    
                                                @foreach($project->tasks as $task)
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
                                                                                                <th style="width:30%;">Name</th>
                                                                                                <th style="width:10%;">Type</th>
                                                                                                <th style="width:40%;">Description</th>
                                                                                                <th style="width:15%;">File</th>
                                                                                                <th style="width:5%;">Action</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($task->resources as $resource)
                                                                                                <tr>
                                                                                                    <td class="text-left">
                                                                                                        {{ $resource->name ?? '' }}
                                                                                                    </td>
                                                                                                    <td style="width:20%;">
                                                                                                        {{ $resource->type ?? '' }}
                                                                                                    </td>
                                                                                                    <td style="width:40%;">
                                                                                                        {{ $resource->description ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a class="btn btn-sm btn-outline-secondary" href="{{ $resource->url ?? '' }}"><i class="fa fa-download"></i> Download</a>  
                                                                                                    </td>
                                                                                                    <td style="width:5%;">
                                                                                                        <a class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash"></i> Delete</a>
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
                                                                                <tag class="text-primary text-bold">Sub Tasks :</tag>
                                                                                <p class="text-justify">
                                                                                    @if ($task->subtasks->count() != 0)
                                                                                    <table id="example1" class="table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th style="width:30%;">Name</th>
                                                                                                <th style="width:35%;">Description </th>
                                                                                                <th style="width:10%;">Executor</th>
                                                                                                <th style="width:10%;">Due Date</th>
                                                                                                <th style="width:10%;">Budget</th>
                                                                                                <th style="width:7%;" colspan="2" class="text-center"> Update Actions</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($task->subtasks as $subtask)
                                                                                                <tr>
                                                                                                    <td class="text-left">
                                                                                                        {{ $subtask->name ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $subtask->description ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $subtask->executor->name ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $subtask->duedate ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        &#8358;{{ number_format(floatval($subtask->budget), 2) }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updateCost{{ $subtask->id }}">Cost</button>
                                                                                                        <div class="modal fade" id="updateCost{{ $subtask->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                                        aria-hidden="true">
                                                                                                            <div class="modal-dialog" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h4 class="modal-title" id="modalLabel">Update Actual Cost</h4>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">??</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <form class="form-horizontal" action="{{ route('subtasks.updateCost', $subtask)}}" method="POST">
                                                                                                                    @csrf
                                                                                                                        <fieldset>
                                                                                                                            <div class="modal-body">
                                                                                                                                
                                                                                                                                <div class="form-group row">
                                                                                                                                    
                                                                                                                                    <div class="col-lg-12">
                                                                                                                                        <label for="subject1" class="col-form-label">
                                                                                                                                            Total Spent on Execution
                                                                                                                                        </label>
                                                                                                                                        <div class="input-group">
                                                                                                                                            <input type="number" id="cost" value="{{ old('cost') }}" class="@error('cost') is-invalid @enderror form-control" placeholder="" name="cost">
                                                                                                                                        </div>
                                                                                                                                        @error('cost')
                                                                                                                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                                                                                                                        @enderror
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>

                                                                                                                            <div class="modal-footer">
                                                                                                                                <div class="form-group row">
                                                                                                                                    <div class="col-lg-12">
                                                                                                                                        <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Update</button>
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
                                                                                                    <td>
                                                                                                        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updateSubTask{{ $subtask->id }}">Status</button>
                                                                                                        <div class="modal fade" id="updateSubTask{{ $subtask->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                                        aria-hidden="true">
                                                                                                            <div class="modal-dialog" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h4 class="modal-title" id="modalLabel">Update Sub Task Status</h4>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">??</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <form class="form-horizontal" action="{{ route('subtasks.updateStatus', $subtask)}}" method="POST">
                                                                                                                    @csrf
                                                                                                                        <fieldset>
                                                                                                                            <div class="modal-body">
                                                                                                                                
                                                                                                                                <div class="form-group row">
                                                                                                                                    
                                                                                                                                    <div class="col-lg-12">
                                                                                                                                        <label for="subject1" class="col-form-label">
                                                                                                                                            Task Status : <br>
                                                                                                                                            <tag class="text-primary">{{ $subtask->name }}</tag>
                                                                                                                                        </label>
                                                                                                                                        <div class="input-group">
                                                                                                                                            <select class="form-control" name="status" required>
                                                                                                                                                <option value="">-- Select Status --</option>
                                                                                                                                                <option value="{{ $completed }}">Completed</option>
                                                                                                                                                <option value="{{ $in_progress }}">In Progress</option>
                                                                                                                                                <option value="{{ $queried }}">Queried</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>

                                                                                                                            <div class="modal-footer">
                                                                                                                                <div class="form-group row">
                                                                                                                                    <div class="col-lg-12">
                                                                                                                                        <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Update</button>
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

                                                                        <tr>
                                                                            <td>
                                                                            <tag class="text-primary text-bold">Comments :</tag>
                                                                                <p class="text-justify">
                                                                                    <?php $i = 1; ?>
                                                                                    @foreach($task->comments as $comment)
                                                                                        {{ $i }}. {{ $comment->user->name  }} <a class="float-right text-white p-1 badge badge-danger">Remove</a><br>
                                                                                        {{ $comment->body }}
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
                                                                    <button class="btn btn-sm btn-outline-dark float-right m-1" data-toggle="modal" data-target="#addSubTask{{ $task->id }}">Add Sub Task</button>
                                                                    <button class="btn btn-sm btn-outline-primary float-right m-1" data-toggle="modal" data-target="#addComment{{ $task->id }}">Add Comment</button>

                                                                    <button class="btn btn-sm btn-outline-primary float-right m-1" data-toggle="modal" data-target="#updateTaskStatus{{ $task->id }}">Change Status</button>
                                                                    <div class="modal fade" id="updateTaskStatus{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Update Task Status</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">??</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form class="form-horizontal" action="{{ route('tasks.updateStatus', $task)}}" method="POST">
                                                                                @csrf
                                                                                    <fieldset>
                                                                                        <div class="modal-body">
                                                                                            
                                                                                            <div class="form-group row">
                                                                                                
                                                                                                <div class="col-lg-12">
                                                                                                    <label for="subject1" class="col-form-label">
                                                                                                        Task Status for : <br>
                                                                                                        <tag class="text-primary">{{ $task->name }}</tag>
                                                                                                    </label>
                                                                                                    <div class="input-group">
                                                                                                        <select class="form-control" name="status" required>
                                                                                                            <option value="">-- Select Status --</option>
                                                                                                            <option value="{{ $completed }}">Completed</option>
                                                                                                            <option value="{{ $in_progress }}">In Progress</option>
                                                                                                            <option value="{{ $queried }}">Queried</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <div class="form-group row">
                                                                                                <div class="col-lg-12">
                                                                                                    <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Update</button>
                                                                                                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

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

                                                                    <div class="modal fade" id="addSubTask{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Add Sub Task</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">??</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form method="POST" action="{{ route('subtasks.store') }}">
                                                                                    <div class="modal-body">

                                                                                        <input name="task_id" value="{{ $task->id }}" hidden readonly> 

                                                                                        @csrf
                                                                                        <div class="form-group row">
                                                                                            
                                                                                            <div class="col-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Task Name
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input type="text" id="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" placeholder="" name="name">
                                                                                                </div>
                                                                                                @error('name')
                                                                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                                                                @enderror
                                                                                            </div>

                                                                                            <div class="col-lg-6">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Budget
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input type="number" id="budget" value="{{ old('budget') }}" class="form-control" min="0" name="budget">
                                                                                                </div>
                                                                                                @error('budget')
                                                                                                    <span class="text-danger">{{ $errors->first('budget') }}</span>
                                                                                                @enderror
                                                                                            </div>

                                                                                            <div class="col-lg-6">
                                                                                                <label End="subject1" class="col-form-label">
                                                                                                    Due Date
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input type="date" id="duedate" class="form-control" name="duedate" required>
                                                                                                </div>
                                                                                                @error('duedate')
                                                                                                    <span class="text-danger">{{ $errors->first('duedate') }}</span>
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
                                                                                                    Depends on
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <select class="form-control col-12" name="preceedby">
                                                                                                        <option value=""> -- Select Task --</option>
                                                                                                        @foreach($project->tasks as $task)
                                                                                                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                                @error('preceedby')
                                                                                                    <span class="text-danger">{{ $errors->first('preceedby') }}</span>
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


                                                                    <div class="modal fade" id="addComment{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Comment {{$task->name}}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">??</span>
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
                                                        
                                                        <?php 
                                                            $i = 2; 
                                                            $start = DateTime::createFromFormat('m/d/Y', $project->start);
                                                            $end = DateTime::createFromFormat('m/d/Y', $project->end);

                                                            $start = \Carbon\Carbon::createFromFormat('Y-m-d', $project->start);
                                                            $end = \Carbon\Carbon::createFromFormat('Y-m-d', $project->end);
                                                            $interval = $start->diffInMonths($end);

                                                            $taskcount = $project->tasks->count();
                                                        ?>
                                                            <tr>
                                                                <th>
                                                                    <div>Name</div>
                                                                </th>
                                                                @for ($i = 1; $i <= $interval; $i++ )
                                                                <th>
                                                                   Week {{ $i }}
                                                                </th>
                                                                @endfor
                                                            </tr>

                                                            @foreach ($project->tasks as $task)
                                                            <tr>
                                                                <td>
                                                                    {{ $task->name }}
                                                                </td>
                                                                @for ($i = 1; $i <= $interval; $i++ )
                                                                <td>
                                                                    <div class="badge badge-success w-100">&nbsp;</div>
                                                                </td>
                                                                @endfor
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane p-3" id="tab5">
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
                                                        <form class="form-horizontal" action="{{ route('projects.upload', $project)}}" method="POST" enctype="multipart/form-data">
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
                                                            <td style="width:5%;">
                                                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-download"></i> Download</a>
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

                                            <div class="row widget_countup mb-5">                        
                                                <div class="col-12 col-sm-6 col-xl-3">
                                                    <div id="top_widget1">
                                                        <div class="">
                                                            <div class="bg-white text-success text-white b_r_5 section_border">
                                                                <div class="p-t-l-r-15">
                                                                    <div class="h3 text-success">&#8358;{{ number_format(floatval($project->budget), 2) }}</div>
                                                                    <div>Estimated Cost</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                                                    <div id="top_widget2">
                                                        <div class="">
                                                            <div class="bg-white text-warning b_r_5 section_border">
                                                                <div class="p-t-l-r-15">
                                                                    <div class="h3 text-warning">&#8358;{{ number_format(floatval($project->tasks->sum('budget')), 2) }}</div>
                                                                    <div>Current Cost</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                                                    <div id="top_widget2">
                                                        <div class="">
                                                            <div class="bg-white text-dark b_r_5 section_border">
                                                                <div class="p-t-l-r-15">
                                                                    <div class="h3 text-dark">&#8358;{{ number_format(floatval($project->budget - $project->tasks->sum('budget')), 2) }}</div>
                                                                    <div>Cost Variance</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                                                    <div id="top_widget4">
                                                        <div class="">
                                                            <div class="bg-white text-danger b_r_5 section_border">
                                                                <div class="p-t-l-r-15">
                                                                    <div id="widget_countup12"> {{ $projects->where('status_id', $overdue)->count() }}</div>
                                                                    <div>Overdue Projects</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            
                                            <h4 class="card-title">Budget Allocation</h4>

                                            <table id="example1" class="table table-striped table-bordered bordered">
                                                <thead>
                                                    <tr>
                                                        <th>SNo</th>
                                                        <th>Task Name</th>
                                                        <th style="width:20%;">Budget</th>
                                                        <th style="width:20%;">Actual Cost </th>
                                                        <th style="width:20%;">Variance</th>
                                                        <th style="width:5%;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($project->tasks as $task)
                                                        <tr>
                                                            <td class="text-left">
                                                                {{ $i }}
                                                            </td>
                                                            <td class="text-left">
                                                                {{ $task->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                &#8358;{{ number_format(floatval($task->budget), 2) }}
                                                            </td>
                                                            <td>
                                                                &#8358;{{ number_format(floatval($task->subtasks->sum('actual_cost')), 2) }}
                                                            </td>
                                                            <td>
                                                                &#8358;{{ number_format(floatval($task->budget - $task->subtasks->sum('actual_cost')), 2) }}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-{{ $task->status->style }}">{{ $task->status->name ?? '' }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="" colspan="6">
                                                                <h5 class="text-primary"><b>Sub Tasks</b></h5>
                                                                <table id="example1" class="table table-striped">
                                                                    <thead>
                                                                        <tr class="text-primary">
                                                                            <th>Task Name</th>
                                                                            <th style="width:20%;">Budget</th>
                                                                            <th style="width:20%;">Actual Cost </th>
                                                                            <th style="width:20%;">Variance</th>
                                                                            <th style="width:5%;">Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($task->subtasks as $subtask)
                                                                            <tr>
                                                                                <td class="text-left">
                                                                                    {{ $subtask->name ?? '' }}
                                                                                </td>
                                                                                <td>
                                                                                    &#8358;{{ number_format(floatval($subtask->budget), 2) }}
                                                                                </td>
                                                                                <td>
                                                                                    &#8358;{{ number_format(floatval($subtask->actual_cost), 2) }}
                                                                                </td>
                                                                                <td>
                                                                                    &#8358;{{ number_format(floatval($subtask->budget - $subtask->actual_cost), 2) }}
                                                                                </td>
                                                                                <td>
                                                                                    <span class="badge badge-{{ $subtask->status->style }}">{{ $subtask->status->name ?? '' }}</span>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <?php $i=$i+1; ?>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane p-3" id="tab7">
                                            <h4 class="card-title">Inventory</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

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
                                                                <button class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#allocateTask{{ $item->id }}">Allocate to Task</button>
                                                                <div class="modal fade" id="allocateTask{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Allocate {{$item->name}} to Task</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">??</span>
                                                                                </button>
                                                                            </div>
                                                                            <form class="form-horizontal" action="#" method="POST">
                                                                            @csrf
                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                        
                                                                                    <div class="col-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Allocate to a task
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="fa fa-home"></i>
                                                                                            </span>
                                                                                            <select class="form-control col-12" name="designation">
                                                                                                <option value=""> -- Select Task --</option>
                                                                                                @foreach($project->tasks as $task)
                                                                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Allocate</button>
                                                                                                <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#allocateSubTask{{ $item->id }}">Allocate to Sub Task</button>
                                                                <div class="modal fade" id="allocateSubTask{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Allocate {{$item->name}} to Sub Task</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">??</span>
                                                                                </button>
                                                                            </div>
                                                                            <form class="form-horizontal" action="#" method="POST">
                                                                            @csrf
                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                        
                                                                                    <div class="col-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Allocate to a Sub task
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-addon">
                                                                                                <i class="fa fa-home"></i>
                                                                                            </span>
                                                                                            <select class="form-control col-12" name="designation">
                                                                                                <option value=""> -- Select Sub Task --</option>
                                                                                                @foreach($project->tasks as $task)
                                                                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Allocate</button>
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
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="tab-pane p-3" id="tab8">
                                            <h4 class="card-title">In Team Messaging</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <table id="example1" class="table table-striped">
                                        
                                                <tbody>
                                                    @foreach($project->messages as $message)
                                                        <tr>
                                                            <td>
                                                            {{ $messages->user->name }}:<br>
                                                            {{ $messages->body }}<br>
                                                            {{ $messages->created_at }}
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
