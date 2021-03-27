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

                            @role('SuperUser|Director|Admin')
                                <button class="btn btn-sm btn-secondary align-right mt-1" data-toggle="modal" data-target="#manageTrip">Manage Project</button>

                                <div class="modal fade" id="manageTrip" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel">Update Status of Project</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="form-horizontal" action="{{ route('projects.update', $project)}}" method="POST">
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
                            <h3><tag class="text-capitalize">{{ $project->name }}</tag></h3>
                            <table id="example1" class="display table table-stripped table-bordered">
                                <tbody>
                                    <!-- <tr><td><b>Project ID: </b></td><td>{{ $project->id }}</td></tr> -->
                                    <tr><td><b>Start Date: </b></td><td>{{ date('d M Y', strtotime($project->startdate)) }}</td></tr>
                                    <tr><td><b>Project Status: </b></td><td><span class="badge badge-{{ $project->status->style }}">{{ $project->status->name }}</span></td></tr>
                                    <tr><td><b>Manager: </b></td><td><span class="badge badge-{{ $project->manager->name ?? '' }}">{{ $project->status->name }}</span></td></tr>
                                    <tr><td><b>Remaining Days: </b></td><td>{{ 67 }} days</td></tr>
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
                                            <a class="nav-link active" href="#tab1" data-toggle="tab">Team Members</a>
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
                                    </ul>
                                </div>
                                <div class="card-body p-2 ">
                                    <div class="tab-content text-justify" style="padding-top:30px;">
                                        <div class="tab-pane p-3 active" id="tab1">
                                            <h4 class="card-title">Team Members</h4>
                                            <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>

                                        <div class="tab-pane p-3" id="tab2">
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

                                                                    <div class="col-lg-12">
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
                                                                            Preceeding Task
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

                                                                    <div class="col-6">
                                                                        <label for="subject1" class="col-form-label">
                                                                            Succeeding Task
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <select class="form-control col-12" name="succeedby">
                                                                                <option value=""> -- Select Task --</option>
                                                                                @foreach($project->tasks as $task)
                                                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        @error('succeedby')
                                                                            <span class="text-danger">{{ $errors->first('succeedby') }}</span>
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

                                            <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>

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
                                                            <tag class="text-primary text-bold">Description :</tag>
                                                            <p class="text-justify">
                                                                {{ $task->description ?? ''}}
                                                            </p>

                                                            <tag class="text-primary text-bold">Depends on :</tag>
                                                            <p class="text-justify">
                                                                {{ $project->tasks->where('preceedby', $task->preceedby)->first()->name ?? '' }}
                                                            </p>

                                                            <tag class="text-primary text-bold">Resources :</tag>
                                                            <p class="text-justify">
                                                                <table id="example1" class="table table-striped table-bordered bordered">
                                                                    <tbody>
                                                                        @foreach($task->resources as $resource)
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
                                                            </p>

                                                            <p class="p-2">
                                                                <button class="btn btn-sm btn-outline-secondary float-right m-1" data-toggle="modal" data-target="#updateTask">Update</button>
                                                                <button class="btn btn-sm btn-outline-danger float-right m-1" data-toggle="modal" data-target="#removeTask">Remove</button>
                                                                <button class="btn btn-sm btn-outline-success float-right m-1" data-toggle="modal" data-target="#addTaskResource">Add Resource</button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="m-t-10 accordian_alignment">
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    

                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane p-3" id="tab3">
                                            <h4 class="card-title">Tab 3</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>

                                        </div>

                                        <div class="tab-pane p-3" id="tab4">
                                            <h4 class="card-title">Project Time line</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            
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
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>

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
