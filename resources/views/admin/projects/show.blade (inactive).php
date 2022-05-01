@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Project
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

                            @role('Super User|Level 1|Level 2|Level 3')
                                
                                <!-- @if ($project->status_id != $completed)
                                <button class="btn btn-sm btn-success align-right mt-1" data-toggle="modal" data-target="#updateBudget">Update Budget</button>
                                @endif

                                <div class="modal fade" id="updateBudget" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Update Budget of Project</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('projects.updateBudget', $project)}}" method="POST">
                                            @csrf
                                            <fieldset>
                                            <div class="modal-body">
                                                
                                                <input type="text" name="project" value="{{ $project->id }}" hidden readonly>
                                                <div class="form-group row text-left">
                                                    <div class="col-12">
                                                        <label for="subject1" class="col-form-label">
                                                            Estimated Cost
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="number"  id="budget" value="{{ $project->budget }}" class="form-control" placeholder="" name="budget">
                                                        </div>
                                                        @error('budget')
                                                            <span class="text-danger">{{ $errors->first('budget') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-responsive layout_btn_prevent btn-success">Submit</button>
                                                        <button class="btn  btn-secondary" data-dismiss="modal">Close me!</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                            @endrole

                            @role('Super User|Level 1|Level 2|Level 3')

                                @if ($project->status_id != $completed)
                                <button class="btn btn-sm btn-secondary align-right mt-1" data-toggle="modal" data-target="#manageProjectStatus">Manage Project</button>    
                                @endif
                                
                                <div class="modal fade" id="manageProjectStatus" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Update Status of Project</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('projects.updateStatus', $project)}}" method="POST">
                                            @csrf
                                            <fieldset>
                                            <div class="modal-body">
                                                
                                                <input type="text" name="project_id" value="{{ $project->id }}" hidden readonly>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <!-- <label for="subject1" class="col-form-label">
                                                            Trip Status
                                                        </label> -->
                                                        <div class="input-group">
                                                        <select class="form-control" name="status" required>
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

                            @role('Super User|Level 1|Level 2|Level 3')
                                @if ($project->status_id != $completed)
                                <button class="btn btn-sm btn-primary align-right mt-1" data-toggle="modal" data-target="#commentProject">Comment on Project</button>
                                @endif

                                <div class="modal fade" id="commentProject" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog text-left" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Comment on {{$project->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('projects.comment') }}" method="POST">
                                            @csrf

                                                <input name="project_id" value="{{ $project->id }}" hidden readonly>

                                                <fieldset>
                                                    <div class="modal-body">
                                                        
                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Comment
                                                            </label>
                                                            <div class="input-group">
                                                                <textarea id="comment" value="{{ old('comment') }}" class="form-control" placeholder="" name="comment"></textarea>
                                                            </div>
                                                            @error('comment')
                                                                <span class="text-danger">{{ $errors->first('comment') }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <button class="btn btn-md btn-responsive layout_btn_prevent btn-primary">Yes, Send</button>
                                                                <button class="btn btn-md btn-secondary" data-dismiss="modal">Close me!</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endrole

                            @role('Super User|Level 1|Level 2|Level 3')
                                <a class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updateProject{{$project->id}}">Update</a>
                                <div class="modal fade" id="updateProject{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Update :<br>{{ $project->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('project.update', $project)}}" method="POST">
                                            @csrf
                                                <fieldset>
                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-12 mt-3">
                                                                <label for="subject1" class="col-form-label">
                                                                    Name
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" id="name" value="{{ $project->name }}" class="@error('name') is-invalid @enderror form-control" placeholder="" name="name">
                                                                </div>
                                                                @error('name')
                                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6 mt-3">
                                                                <label End="subject1" class="col-form-label">
                                                                    Start Date
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="date" id="start" value="{{ $project->start }}" class="form-control" name="start" required>
                                                                </div>
                                                                @error('start')
                                                                    <span class="text-danger">{{ $errors->first('start') }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-lg-6 mt-3">
                                                                <label End="subject1" class="col-form-label">
                                                                    End Date
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="date" id="end" value="{{ $project->end }}" class="form-control" name="end" required>
                                                                </div>
                                                                @error('end')
                                                                    <span class="text-danger">{{ $errors->first('end') }}</span>
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
                            @endrole
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Project Information
                        </div>
                        <div class="card-body m-t-35">
                            <h3><tag class="text-uppercase text-success">{{ $project->name ?? '' }}</tag></h3>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped">
                                            <tbody>
                                                <!-- <tr><td><b>Project ID: </b></td><td>{{ $project->id }}</td></tr> -->
                                                <tr>
                                                    <td><b>Objective: </b><br><tag class="">{{ $project->objective ?? '' }}</tag> </td>
                                                    <td><b>Budget: </b><br><tag class="">&#8358;{{ number_format(floatval($project->budget), 2) }}</tag></td>
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped">
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
                                                    <td><b>Project Completion </b><br> {{ number_format(floatval($completion), 0) }}%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                                            <a class="nav-link" href="#tab2" data-toggle="tab">Project Tasks</a>
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
                                            <a class="nav-link" href="#tab8" data-toggle="tab">Comments</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab9" data-toggle="tab">Notifications</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-2 ">
                                    <div class="tab-content text-justify" style="padding-top:30px;">
                                        
                                        <div class="tab-pane p-3 " id="tab1">
                                            <h4 class="card-title">Project Team Members</h4>
                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <button class="btn btn-sm btn-secondary float-left m-1  mb-3" data-toggle="modal" data-target="#addMemberToProject">Add Member</button>
                                            <div class="modal fade" id="addMemberToProject" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalLabel">Add Member to Project : </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form class="form-horizontal" action="{{ route('projects.addMember', $project)}}" method="POST">
                                                        @csrf
                                                        <fieldset>
                                                            <div class="modal-body">
                                                                
                                                                <input type="text" name="project_id" value="{{ $project->id }}" hidden readonly>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Select New Project Member
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <select class="form-control" name="member" required>
                                                                                <option value="">-- Select Member --</option>
                                                                                @foreach ($staff as $member)                                                                                                    
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

                                            <div class="table-responsive">
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
                                                                {{ $member->designation->name ?? '' }}
                                                            </td>

                                                            <td>
                                                                <button class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#SendPersonalMessageTo{{$member->id}}">Send Message</button>
                                                                <div class="modal fade" id="SendPersonalMessageTo{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Send Message to {{$member->user->name}}</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <form class="form-horizontal" action="{{ route('messages.store') }}" method="POST">
                                                                            @csrf
                                                                                
                                                                                <input name="project_id" value="{{ $project->id }}" hidden readonly>
                                                                                <input name="receiver" value="{{ $member->user->id }}" hidden readonly> 

                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                        
                                                                                        <div class="col-12">
                                                                                            <label for="subject1" class="col-form-label">
                                                                                                Message
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <textarea id="body" value="{{ old('body') }}" class="form-control" placeholder="" name="body"></textarea>
                                                                                            </div>
                                                                                            @error('body')
                                                                                                <span class="text-danger">{{ $errors->first('body') }}</span>
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
                                                                <button class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#changeMemberRole{{$member->id}}">Change Role</button>
                                                                <div class="modal fade" id="changeMemberRole{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Update Role for {{$member->user->name}}</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <form class="form-horizontal" action="{{ route('projects.updateRole')}}" method="POST">
                                                                            @csrf
                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                    
                                                                                    <input name="member" value="{{$member->id}}" hidden readonly>
                                                                                    <input name="project" value="{{$project->id}}" hidden readonly>

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
                                                                <button class="btn btn-sm btn-outline-danger text-right" data-toggle="modal" data-target="#removeMemberFromTeam{{$member->id}}">Remove</button>
                                                                <div class="modal fade" id="removeMemberFromTeam{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Remove {{$member->user->name}} from Project</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
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
                                        </div>

                                        <div class="tab-pane p-3 active" id="tab2">
                                            <h4 class="card-title m-b-3">Project Tasks & Processes</h4>
                                            
                                            <button class="btn btn-raised btn-sm btn-outline-success mt-3 mb-3 adv_cust_mod_btn"
                                                data-toggle="modal" data-target="#modalTaskCreate">Add New Task
                                            </button>

                                            <button class="btn btn-raised btn-sm btn-outline-secondary mt-3 mb-3 adv_cust_mod_btn"
                                                data-toggle="modal" data-target="#modalCommentCreate">Add a Comment
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
                                                                            <input type="date" id="start" class="form-control" min="{{ $project->start }}" max="{{ $project->end }}" name="start" required>
                                                                        </div>
                                                                        @error('start')
                                                                            <span class="text-danger">{{ $errors->first('start') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label End="subject1" class="col-form-label">
                                                                            End Date
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <input type="date" id="end" class="form-control" name="end"  min="{{ $project->start }}" max="{{ $project->end }}" required>
                                                                        </div>
                                                                        @error('end')
                                                                            <span class="text-danger">{{ $errors->first('end') }}</span>
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

                                            <div class="modal fade" id="modalCommentCreate" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-header bg-secondary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">COmment</h4>
                                                        </div>
                                                        
                                                        <form class="form-horizontal" action="{{ route('tasks.comment') }}" method="POST">
                                                            @csrf

                                                            <input name="project_id" value="{{ $project->id }}" hidden readonly>

                                                            <fieldset>
                                                                <div class="modal-body">

                                                                    <div class="col-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Select Task to Comment on
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <select class="form-control col-12" name="task_id">
                                                                                <option value=""> -- Select Task --</option>
                                                                                @foreach($project->tasks as $task)
                                                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        @error('task')
                                                                            <span class="text-danger">{{ $errors->first('task') }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Comment
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <textarea id="message" value="{{ old('comment') }}" class="form-control" placeholder="" name="comment"></textarea>
                                                                        </div>
                                                                        @error('comment')
                                                                            <span class="text-danger">{{ $errors->first('comment') }}</span>
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

                                            <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <div class="m-t-10 accordian_alignment">
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    
                                                @foreach($project->tasks as $task)
                                                    <div class="card mb-2">
                                                        <div class="card-header bg-white" role="tab" id="title-one">
                                                            <a class="collapsed accordion-section-title" data-toggle="collapse" data-parent="#accordion" href="#card-data-one{{$task->id}}" aria-expanded="false">
                                                                <div class="row"> 
                                                                    <div class="col-lg-2 col-sm-2"> <span class="float-left p-1 badge badge-{{ $task->status->style }}">{{ $task->status->name }}</span> </div>
                                                                    <div class="col-lg-8 col-sm-8"> {{ $task->order ?? ''}} {{ $task->name ?? ''}} </div>
                                                                    <div class="col-lg-2 col-sm-2"> <i class="fa fa-plus float-right m-t-5"></i> </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="card-data-one{{$task->id}}" class="card-collapse collapse">
                                                            <div class="card-body m-t-20">

                                                                <table class="table table-hover" style="width:100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <tag class="text-primary text-bold">Task Budget :</tag>
                                                                                <p class="text-justify">
                                                                                    &#8358;{{ number_format(floatval($task->budget ?? 0), 2) }}
                                                                                </p>
                                                                            </td>
                                                                        </tr>
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
                                                                                                <th style="width:5%;">File</th>
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
                                                                                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('tasks.download', $resource->id)}}"><i class="fa fa-download"></i> Download</a>  
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
                                                                                                <th style="width:5%;">Status</th>
                                                                                                <th style="width:35%;">Name</th>
                                                                                                <th style="width:10%;">Start</th>
                                                                                                <th style="width:10%;">End</th>
                                                                                                <th style="width:10%;">Budget</th>
                                                                                                <th style="width:10%;">Cost</th>
                                                                                                <th style="width:20%;" colspan="1" class="text-left"> Update Actions</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($task->subtasks as $subtask)
                                                                                                <tr>
                                                                                                    <td class="text-left">
                                                                                                        <span class="badge badge-{{ $subtask->status->style }}">{{ $subtask->status->name ?? '' }}</span>
                                                                                                    </td>
                                                                                                    <td class="text-left">
                                                                                                        {{ $subtask->name ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ date('d/M/Y', strtotime($subtask->start)) }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ date('d/M/Y', strtotime($subtask->end)) }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        &#8358;{{ number_format(floatval($subtask->budget), 2) }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        &#8358;{{ number_format(floatval($subtask->actual_cost), 2) }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updateSubTaskCost{{$subtask->id}}">Cost</a>
                                                                                                        <div class="modal fade" id="updateSubTaskCost{{$subtask->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                                        aria-hidden="true">
                                                                                                            <div class="modal-dialog" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h4 class="modal-title" id="modalLabel">Update Actual Cost of : <br>{{$subtask->name}}</h4>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">×</span>
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
                                                                                                    
                                                                                                        <a class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updateSubTaskStatus{{$subtask->id}}">Status</a>
                                                                                                        <div class="modal fade" id="updateSubTaskStatus{{$subtask->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                                        aria-hidden="true">
                                                                                                            <div class="modal-dialog" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h4 class="modal-title" id="modalLabel">Update Status for: <br>{{$subtask->name}}</h4>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">×</span>
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

                                                                                                        <a class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#updateSubTaskExecutor{{$subtask->id}}">Assign</a>
                                                                                                        <div class="modal fade" id="updateSubTaskExecutor{{$subtask->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                                        aria-hidden="true">
                                                                                                            <div class="modal-dialog" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h4 class="modal-title" id="modalLabel">Assign to Team Member <br>{{$subtask->name}}</h4>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">×</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <form class="form-horizontal" action="{{ route('subtasks.updateExecutor', $subtask)}}" method="POST">
                                                                                                                    @csrf
                                                                                                                        <fieldset>
                                                                                                                            <div class="modal-body">
                                                                                                                                
                                                                                                                                <div class="form-group row">
                                                                                                                                    <div class="col-lg-12">
                                                                                                                                        <label for="subject1" class="col-form-label">
                                                                                                                                            Select Executor
                                                                                                                                        </label>
                                                                                                                                        <div class="input-group">
                                                                                                                                        <select class="form-control" name="member" required>
                                                                                                                                            <option value="">-- Select Member --</option>
                                                                                                                                            @foreach ($task->members as $member)                                                                                                    
                                                                                                                                            <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                                                                                                                                            @endforeach
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
                                                                                        {{ $i }}. {{ $member->user->name  }} 

                                                                                        <a class="btn btn-sm btn-outline-warning float-right" data-toggle="modal" data-target="#removeFromTask{{$member->id}}">remove</a>
                                                                                        <div class="modal fade" id="removeFromTask{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                        aria-hidden="true">
                                                                                            <div class="modal-dialog" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h4 class="modal-title" id="modalLabel">Remove {{ $member->user->name  }} from, <br>{{$task->name}}</h4>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">×</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <form class="form-horizontal" action="{{ route('tasks.removeMember', $task)}}" method="POST">
                                                                                                    @csrf

                                                                                                        <input name="member" value="{{$member->id}}" hidden readonly>
                                                                                                        <input name="task" value="{{$task->id}}" hidden readonly>
                                                                                                    
                                                                                                        <fieldset>
                                                                                                            <div class="modal-body">
                                                                                                                
                                                                                                                <div class="form-group row">
                                                                                                                    
                                                                                                                    <div class="col-lg-12">
                                                                                                                        <label for="subject1" class="col-form-label">
                                                                                                                            Are you sure you want to remove this member from this task?
                                                                                                                        </label>
                                                                                                                        <input hidden readonly type="text" value="{{ $member->user->id }}" name="member">
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
                                                                                        <?php $i=$i+1; ?>
                                                                                    @endforeach
                                                                                </p>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <tag class="text-primary text-bold">Comments :</tag>
                                                                                <p class="text-justify">
                                                                                    @foreach($task->comments as $comment)
                                                                                        <b>{{ $comment->creator->name  }}</b>
                                                                                        <a class="btn btn-sm btn-outline-danger float-right" data-toggle="modal" data-target="#deleteCommentFromSubTask{{$subtask->id}}">remove</a>
                                                                                        <div class="modal fade" id="deleteCommentFromSubTask{{$subtask->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                                        aria-hidden="true">
                                                                                            <div class="modal-dialog" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h4 class="modal-title" id="modalLabel">Delete comment</h4>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">×</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <form class="form-horizontal" action="{{ route('tasks.deleteComment', $comment)}}" method="POST">
                                                                                                    @csrf
                                                                                                        <fieldset>
                                                                                                            <div class="modal-body">
                                                                                                                
                                                                                                                <div class="form-group row">
                                                                                                                    
                                                                                                                    <div class="col-lg-12">
                                                                                                                        <label for="subject1" class="col-form-label">
                                                                                                                            Are you sure you want to remove this comment from this task?
                                                                                                                        </label>
                                                                                                                        <input hidden readonly type="text" value="{{ $comment->id }}" name="comment">
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>

                                                                                                            <div class="modal-footer">
                                                                                                                <div class="form-group row">
                                                                                                                    <div class="col-lg-12">
                                                                                                                        <button class="btn btn-sm btn-responsive layout_btn_prevent btn-danger">Delete</button>
                                                                                                                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{ $comment->body }}<br><br>
                                                                                    @endforeach
                                                                                    
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <p class="p-2">
                                                                    <button class="btn btn-sm btn-outline-secondary float-right m-1" data-toggle="modal" data-target="#updateTaskStatus{{$task->id}}">Update Status</button>
                                                                    <button class="btn btn-sm btn-outline-danger float-right m-1" data-toggle="modal" data-target="#deleteTaskFromProject{{$task->id}}">Delete this Task</button>
                                                                    <button class="btn btn-sm btn-outline-warning float-right m-1" data-toggle="modal" data-target="#addMemberToTask{{$task->id}}">Add Member to Task</button>
                                                                    <button class="btn btn-sm btn-outline-success float-right m-1" data-toggle="modal" data-target="#addResourceToTask{{ $task->id }}">Add Resource</button>
                                                                    <button class="btn btn-sm btn-outline-dark float-right m-1" data-toggle="modal" data-target="#addSubTaskToTask{{$task->id}}">Add Sub Task</button>
                                                                    
                                                                    <div class="modal fade" id="updateTaskStatus{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Update Status for: {{ $task->name }}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
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
                                                                    
                                                                    <div class="modal fade" id="deleteTaskFromProject{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Delete {{$task->name}} from Project</h4>
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
                                                                                                    Are you sure you want to delete the sub Task and its sub tasks?
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <div class="form-group row">
                                                                                                <div class="col-lg-12">
                                                                                                    <button class="btn btn-sm btn-responsive layout_btn_prevent btn-danger">Yes, Delete</button>
                                                                                                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close me!</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal fade" id="addMemberToTask{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Add Member to Task : <br>{{ $task->name }}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
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
                                                                                                    @foreach ($project->members as $member)                                                                                                    
                                                                                                    <option value="{{ $member->user_id }}">{{ $member->user->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Select Role on Project
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                <select class="form-control" name="member" required>
                                                                                                    <option value="">-- Select Role --</option>
                                                                                                    @foreach ($designations as $designation)                                                                                                    
                                                                                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
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

                                                                    <div class="modal fade" id="addResourceToTask{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Add Resource to : <br>{{ $task->name }}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
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

                                                                    <div class="modal fade" id="addSubTaskToTask{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Add Sub Task to {{ $task->name }}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form method="POST" action="{{ route('subtasks.store') }}">
                                                                                    <div class="modal-body">

                                                                                        <input name="project_id" value="{{ $project->id }}" hidden readonly> 
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
                                                                                                    Start Date
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input type="date" id="end" class="form-control" name="start"  min="{{ $task->start }}" max="{{ $task->end }}" required>
                                                                                                </div>
                                                                                                @error('duedate')
                                                                                                    <span class="text-danger">{{ $errors->first('duedate') }}</span>
                                                                                                @enderror
                                                                                            </div>

                                                                                            <div class="col-lg-6">
                                                                                                <label End="subject1" class="col-form-label">
                                                                                                    End Date
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input type="date" id="end" class="form-control" min="{{ $task->start }}" max="{{ $task->end }}" name="end" required>
                                                                                                </div>
                                                                                                @error('end')
                                                                                                    <span class="text-danger">{{ $errors->first('end') }}</span>
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

                                            @if ($project->logs->count() != 0)
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:20%;">Date</th>
                                                            <th style="width:80%;">Activity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($project->logs as $log)
                                                            <tr>
                                                                <td class="text-left">
                                                                    {{ date('d M Y, H:ia', strtotime($log->created_at)) }}
                                                                </td>
                                                                <td style="width:10%;">
                                                                    {{ $log->body ?? '' }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif

                                        </div>

                                        <div class="tab-pane p-3" id="tab4">
                                            <h4 class="card-title">Project Time line</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <div class="table-responsive text-nowrap overflow-auto ">
                                                <table id="example1" class="table w-100">
                                                    <tbody>
                                                            <tr>
                                                                <th style="width:40%">
                                                                    <div>Name</div>
                                                                </th>
                                                                @for ($i = 1; $i <= $totalweeks; $i++ )
                                                                <th>
                                                                   Week {{ $i }}
                                                                </th>
                                                                @endfor
                                                            </tr>

                                                            @foreach ($flots as $flot)
                                                            <tr>
                                                                <td>
                                                                    {{ $flot['name'] }}
                                                                </td>

                                                                @for ($i = 1; $i <= $flot['preoffset']; $i++ )
                                                                <td>
                                                                    &nbsp;
                                                                </td>
                                                                @endfor

                                                                @for ($i = 1; $i <= $flot['length']; $i++ )
                                                                <td>
                                                                    <div class="badge badge-{{$flot['status_style']}} w-100">&nbsp;</div>
                                                                </td>
                                                                @endfor

                                                                @for ($i = 1; $i <= $flot['postoffset']; $i++ )
                                                                <td>
                                                                    &nbsp;
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
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Upload Resource to Project</h4>
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

                                            @if ($project->resources->count() != 0)
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped">
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
                                                        @foreach($project->resources as $resource)
                                                            <tr>
                                                                <td class="text-left">
                                                                    {{ $resource->name ?? '' }}
                                                                </td>
                                                                <td style="width:10%;">
                                                                    {{ $resource->type ?? '' }}
                                                                </td>
                                                                <td style="width:40%;">
                                                                    {{ $resource->description ?? '' }}
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('projects.download', $resource->id)}}"><i class="fa fa-download"></i> Download</a>
                                                                </td>
                                                                <td style="width:5%;">
                                                                    <a class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash"></i> Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
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
                                                                    <div class="h3 text-success">&#8358;{{ number_format(floatval($project->budget ?? 0), 2) }}</div>
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
                                                                    <div class="h3 text-warning">&#8358;{{ number_format(floatval($project->tasks->sum('budget') ?? 0), 2) }}</div>
                                                                    <div>Total Allocated</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                                                    <div id="top_widget2">
                                                        <div class="">
                                                            <div class="bg-white text-primary b_r_5 section_border">
                                                                <div class="p-t-l-r-15">
                                                                    <div class="h3 text-primary">&#8358;{{ number_format(floatval($project->subtasks->sum('actual_cost') ?? 0), 2) }}</div>
                                                                    <div>Total Spent</div>
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
                                                                    <div class="h3 text-dark">&#8358;{{ number_format(floatval($project->budget - $project->tasks->sum('budget') ?? 0), 2) }}</div>
                                                                    <div>Cost Variance</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <h4 class="card-title">Budget Allocation</h4>

                                            <div class="table-responsive">
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
                                                            <tr class="bg-secondary text-white">
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
                                                                <td class="bg-white">
                                                                    <span class="badge badge-{{ $task->status->style }}">{{ $task->status->name ?? '' }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="" colspan="6">
                                                                    <h5><b>Sub Tasks</b></h5>
                                                                    <table id="example1" class="table table-striped">
                                                                        <thead>
                                                                            <tr>
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

                                        </div>

                                        <div class="tab-pane p-3" id="tab7">
                                            <h4 class="card-title">Inventory</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <div class="table-responsive">
                                                <table id="example1" class="">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:40%;">Name </th>
                                                            <th style="width:10%;">Category</th>
                                                            <th style="width:10%;">Quantity</th>
                                                            <th style="width:10%;">Available</th>
                                                            <th style="width:5%;">Status</th>
                                                            <th style="width:15%;" class="text-center" colspan="3">Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($project->inventory->items as $item)
                                                            <tr>
                                                                <td>
                                                                    {{ $item->name}}
                                                                </td>
                                                                <td>
                                                                    {{ $item->category->name ?? '' }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->quantity ?? '' }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->available ?? '' }}
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-{{$item->status->style }}">{{ $item->status->name }}</span>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#DisburseItem{{ $item->id }}">Disburse</a>
                                                                    <div class="modal fade" id="DisburseItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Disburse {{ $item->name }}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form class="form-horizontal" action="{{ route('items.disburse') }}" method="POST">
                                                                                @csrf
                                                                                    <fieldset>
                                                                                        <div class="modal-body">
                                                                                            
                                                                                            <input value="{{ $item->id }}" hidden readonly name="inventory_item_id">
                                                                                            <input value="{{ $project->inventory->id }}" hidden readonly name="inventory_id">
                                                                                                
                                                                                            <div class="col-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Received By
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <select class="form-control" name="member" required>
                                                                                                        <option value="">-- Select Member --</option>
                                                                                                        @foreach ($members as $member)                                                                                                    
                                                                                                        <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Quantity
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input id="quantity" value="{{ old('quantity') ?? $item->available }}" min="1" max="{{ $item->available }}"  class="form-control" name="quantity">
                                                                                                </div>
                                                                                                @error('quantity')
                                                                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <div class="form-group row">
                                                                                                <div class="col-lg-12">
                                                                                                    <button class="btn btn-sm btn-responsive text-white layout_btn_prevent btn-success">Yes, Allocate</button>
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
                                                                    <a class="btn btn-sm btn-outline-warning text-right" data-toggle="modal" data-target="#ReturnItem{{ $item->id }}">Return</a>
                                                                    <div class="modal fade" id="ReturnItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">Return {{ $item->name }}</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form class="form-horizontal" action="{{ route('items.return') }}" method="POST">
                                                                                @csrf
                                                                                    <fieldset>
                                                                                        <div class="modal-body">
                                                                                            
                                                                                            <input value="{{ $item->id }}" hidden readonly name="inventory_item_id">
                                                                                            <input value="{{ $project->inventory->id }}" hidden readonly name="inventory_id">
                                                                                                
                                                                                            <div class="col-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Returned By
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <select class="form-control" name="member" required>
                                                                                                        <option value="">-- Select Member --</option>
                                                                                                        @foreach ($members as $member)                                                                                                    
                                                                                                        <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-12">
                                                                                                <label for="subject1" class="col-form-label">
                                                                                                    Quantity
                                                                                                </label>
                                                                                                <div class="input-group">
                                                                                                    <input id="quantity" value="{{ old('quantity') }}" min="1"  class="form-control" name="quantity">
                                                                                                </div>
                                                                                                @error('quantity')
                                                                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <div class="form-group row">
                                                                                                <div class="col-lg-12">
                                                                                                    <button class="btn btn-sm btn-responsive text-white layout_btn_prevent btn-success">Yes, Return</button>
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
                                                                    <a class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#ItemHistory{{ $item->id }}">History</a>
                                                                    <div class="modal fade" id="ItemHistory{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                    aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="modalLabel">{{ $item->name}} disburse/Refund History</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
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
                                                                                            @foreach($item->itemActivities as $activity)
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        {{ $activity->type}}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $activity->user->name ?? '' }}<br>
                                                                                                        <tag style="font-size:10px;">{{ $activity->created_at }}</tag>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $activity->receiver->name ?? '' }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $activity->quantity ?? '' }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                    
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

                                        </div>

                                        <div class="tab-pane p-3" id="tab8">
                                            <h4 class="card-title">Comments</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped">
                                            
                                                    <tbody>
                                                        @foreach($project->comments as $comment)
                                                            <tr>
                                                                <td>
                                                                {{ $comment->creator->name  }} commented on 

                                                                @if ($comment->sub_task_id != NULL)
                                                                    {{ $comment->subtask->name  }}
                                                                @elseif ($comment->task_id != NULL)
                                                                    {{ $comment->task->name  }}
                                                                @else
                                                                    {{ $comment->project->name  }}
                                                                @endif
                                                                <br>
                                                                {{ $comment->body }}<br>
                                                                <b>{{ date('d M Y, h:ia', strtotime($comment->created_at)) }}</b>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane p-3" id="tab">
                                            <h4 class="card-title">Notifications</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped">
                                            
                                                    <tbody>
                                                        <!-- @foreach($project->comments as $comment)
                                                            <tr>
                                                                <td>
                                                                {{ $comment->creator->name  }} commented on 

                                                                @if ($comment->sub_task_id != NULL)
                                                                    {{ $comment->subtask->name  }}
                                                                @elseif ($comment->task_id != NULL)
                                                                    {{ $comment->task->name  }}
                                                                @else
                                                                    {{ $comment->project->name  }}
                                                                @endif
                                                                <br>
                                                                {{ $comment->body }}<br>
                                                                <b>{{ date('d M Y, h:ia', strtotime($comment->created_at)) }}</b>
                                                                </td>
                                                            </tr>
                                                        @endforeach -->
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
