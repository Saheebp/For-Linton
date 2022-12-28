@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Task
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
                        Tasks
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
                            <a href="#"> Task </a>
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
                                <button class="btn btn-sm btn-secondary align-right mt-1" data-toggle="modal" data-target="#manageProject">Manage Project</button>

                                <div class="modal fade" id="manageProject" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Update Status of Project</h4>
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
                                                        <label for="subject1" class="col-form-label float-left">
                                                            Task Status
                                                        </label>
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
                            <i class="fa fa-table"></i> Task Information
                        </div>

                        <div class="card-body m-t-35">
                            <h3><tag class="text-capitalize">{{ $task->name }}</tag></h3>
                            <table id="example1" class="display table table-stripped table-bordered">
                                <tbody>
                                    <!-- <tr><td><b>Task ID: </b></td><td>{{ $task->id }}</td></tr> -->
                                    <tr><td><b>Due Date: </b></td><td>{{ date('d M Y', strtotime($task->duedate)) }}</td></tr>
                                    <tr><td><b>Task Status: </b></td><td><span class="badge badge-{{ $task->status->style }}">{{ $task->status->name }}</span></td></tr>
                                    <tr><td><b>Remaining Days: </b></td><td>{{ round(( strtotime($task->duedate) - strtotime($task->created_at)) / 3600 ) }} hours</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card m-t-35">
                                        <div class="card-header bg-white">
                                            Team Members
                                        </div>
                                        <!-- <div class="card-body">
                                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div> -->
                                        <ul class="list-group list-group-flush">
                                            <?php $i = 1; ?>
                                            @foreach($task->members as $member)
                                                <li class="list-group-item">{{ $i }}. {{ $member->user->name  }} 
                                                
                                                <a href="" class="float-right btn btn-sm btn-secondary p-0 pr-1 pl-1" data-toggle="modal" data-target="#removeMember">Remove</a></li>
                                                <div class="modal fade" id="removeMember" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel">Remove</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form class="form-horizontal" action="{{ route('tasks.removeMember')}}" method="POST">
                                                            @csrf
                                                            <fieldset>
                                                            <div class="modal-body">
                                                                
                                                                <input hidden readonly name="member_id" value="{{ $member->id }}">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-12">
                                                                        <label for="subject1" class="col-form-label float-left">
                                                                            Are you sure you want to remove this team member? 
                                                                        </label>
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

                                                <?php $i=$i+1; ?>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card m-t-35">
                                        <div class="card-header bg-white">
                                            Sub Tasks
                                        </div>
                                        <!-- <div class="card-body">
                                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div> -->
                                        <ul class="list-group list-group-flush">
                                            <?php $i = 1; ?>
                                            @foreach($task->subtasks as $subtask)
                                                <li class="list-group-item">{{ $i }}. {{ $subtask->name  }} <a href="" class="float-right btn btn-sm btn-warning p-0 pr-1 pl-1">Remove</a></li>
                                                <?php $i=$i+1; ?>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card m-t-35">
                                        <div class="card-header bg-white">
                                            Recent Activity
                                        </div>
                                        <!-- <div class="card-body">
                                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div> -->
                                        <ul class="list-group list-group-flush">
                                            <?php $i = 1; ?>
                                            @foreach($task->subtasks as $subtask)
                                                <li class="list-group-item">{{ $i }}. {{ $subtask->name  }} <a href="" class="float-right btn btn-sm btn-warning p-0 pr-1 pl-1">Remove</a></li>
                                                <?php $i=$i+1; ?>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card m-t-35">
                                        <div class="card-header bg-white">
                                            Resources

                                            <a href="" class="float-right btn btn-sm btn-secondary p-0 pr-1 pl-1" data-toggle="modal" data-target="#addTaskResource">upload</a></li>
                                            <div class="modal fade" id="addTaskResource" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalLabel">Add Resource to Task</h4>
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
                                                                    <label for="subject1" class="col-form-label">
                                                                            Resource
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
                                        </div>
                                        <!-- <div class="card-body">
                                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div> -->
                                        <ul class="list-group list-group-flush">
                                            <?php $i = 1; ?>
                                            @foreach($task->resources as $resource)
                                                <li class="list-group-item">{{ $i }}. {{ $task->name  }} <a href="" class="float-right btn btn-sm btn-warning p-0 pr-1 pl-1">Remove</a></li>
                                                <?php $i=$i+1; ?>
                                            @endforeach
                                        </ul>
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
