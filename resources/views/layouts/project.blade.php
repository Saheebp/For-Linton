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

                            @role('Level 1|Level 2|Level 3')
                                
                                @if ($project->status_id != $completed)
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
                                </div>
                            @endrole

                            @role('Level 1|Level 2|Level 3')

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

                            @role('Level 1|Level 2|Level 3')
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
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Project Information
                        </div>
                        <div class="card-body m-t-35">
                            <h3><tag class="text-uppercase text-success">{{ $project->name ?? '' }}</tag></h3>
                            
                            <div class="row">
                                <div class="col-lg-6">
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
                                <div class="col-lg-6">
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

                                                <?php
                                                    $completed_tasks = $project->tasks->where('status_id',$completed)->count();
                                                    $all_tasks = $project->tasks->count();
                                                    $completion = ($completed_tasks == 0) ? 0 : ($completed_tasks/$all_tasks)*100;
                                                ?>

                                                <td><b>Project Completion </b><br> {{ number_format(floatval($completed_tasks), 0) }}%</td>
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
                                            <a class="nav-link {{ $tabtea ?? ''}}" href="{{ route('projects.team', $project->id) }}"  >Team Members</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabtas ?? ''}}" href="{{ route('projects.tasks', $project->id) }}"  >Project Tasks</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabact ?? ''}}" href="{{ route('projects.activity', $project->id) }}"  >Recent Activity</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabtim ?? ''}}" href="{{ route('projects.timeline', $project->id) }}"  >Timeline</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabres ?? ''}}" href="{{ route('projects.resources', $project->id) }}"  >Project Resources</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabbud ?? ''}}" href="{{ route('projects.budget', $project->id) }}"  >Budget</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabinv ?? ''}}" href="{{ route('projects.inventory', $project->id) }}"  >Inventory</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link {{ $tabcom ?? ''}}" href="{{ route('projects.comments', $project->id) }}"  >Comments</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-2 ">
                                    @yield('page') 
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
