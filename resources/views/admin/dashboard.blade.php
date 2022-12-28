@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop

<?php
    use Carbon\Carbon;
?>

@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="outer">
        <div class="inner bg-container">


            <div class="row widget_countup">
                        
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="top_widget1">
                        
                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $new) }}">
                                <div class="bg-white text-primary text-white b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup12">{{ $all_projects->where('status_id', $new)->count() }}</div>
                                        <div>New Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">

                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $pending) }}">
                                <div class="bg-white text-warning b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup22">{{ $all_projects->where('status_id', $pending)->count() }}</div>
                                        <div>Pending Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget3">

                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $overdue) }}">
                                <div class="bg-white text-success b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup12"> {{ $all_projects->where('status_id', $completed)->count() }}</div>
                                        <div>Completed Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget4">

                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $overdue) }}">
                                <div class="bg-white text-danger b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup12"> {{ $all_projects->where('status_id', $overdue)->count() }}</div>
                                        <div>Overdue Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            

            <div class="row" >


                <div class="col-lg-4 col-12">
                    <div class="card m-t-35">
                        <div class="card-header bg-white text-primary text-center">
                        {{ $chart1->options['chart_title'] }}
                        </div>
                        
                        <div class="card-body" style="height: auto;  overflow:hidden;">
                            <div class="list-group m-t-35">
                            {!! $chart1->renderHtml() !!}
                            </div>
                        </div>

                    </div>

                    <div class="card m-t-35">
                        <div class="card-header bg-white text-primary text-center">
                        Workload Tasks
                        </div>
                        
                        <div class="card-body" style="height: auto;  overflow:hidden;">
                            <div class="list-group m-t-35">
                                <table id="example1" class="table table-striped table-bordered bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:40%;" class="text-center">Name</th>
                                        <th style="width:20%;" class="text-center">Tasks </th>
                                        <th style="width:20%;" class="text-center">completed</th>
                                        <th style="width:20%;" class="text-center">Pending</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        @if($user->projects->count() != 0)
                                        <tr>
                                            <td><a href="#">{{ $user->name }}</a></td>
                                            <td>{{ $user->tasks->count() }}</td>
                                            <td>{{ $user->tasks->where('status_id',$completed)->count() }}</td>
                                            <td>{{ $user->tasks->where('status_id',$pending)->count() }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-12">
                    <div class="card m-t-35">
                        <div class="card-header bg-white text-primary text-center">
                            Overdue Tasks
                        </div>
                        
                        <div class="card-body" style="max-height:300px; overflow:scroll;">
                            <div class="list-group m-t-35">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-bordered bordered">
                                        <thead>
                                        <tr>
                                            <th style="width:15%;" class="text-center">Overdue&nbsp;By</th>
                                            <th style="width:20%;" class="text-center">Task</th>
                                            <th style="width:15%;" class="text-center">Deadline </th>
                                            <th style="width:10%;" class="text-center">Assigned&nbsp;To</th>
                                            <th style="width:30%;" class="text-center">Project</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tasks as $task)
                                                @if($task->end < Carbon::now())
                                                    <tr>
                                                        <td>{{ date('d M Y', strtotime($task->end)) }}</td>
                                                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                                                        <td>{{ date('d M Y', strtotime($task->end)) }}</td>
                                                        <td>{{ $task->executor->name ?? 'NA' }}</td>
                                                        <td>{{ $task->project->name }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card m-t-35">
                        <div class="card-header bg-white text-primary text-center">
                            Upcoming Deadlines
                        </div>
                        
                        <div class="card-body" style="max-height:300px; overflow:scroll;">
                            <div class="list-group m-t-35">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-bordered bordered">
                                        <thead>
                                        <tr>
                                            <th style="width:15%;" class="text-center">Overdue&nbsp;By</th>
                                            <th style="width:20%;" class="text-center">Task</th>
                                            <th style="width:15%;" class="text-center">Deadline </th>
                                            <th style="width:10%;" class="text-center">Assigned&nbsp;To</th>
                                            <th style="width:30%;" class="text-center">Project</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tasks as $task)
                                                @if ($task->end >= Carbon::now())
                                                    <tr>
                                                        <td>{{ date('d M Y', strtotime($task->end)) }}</td>
                                                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                                                        <td>{{ date('d M Y', strtotime($task->end)) }}</td>
                                                        <td>{{ $task->executor->name ?? 'NA' }}</td>
                                                        <td>{{ $task->project->name }}</td>
                                                    </tr> 
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card m-t-35">
                        <div class="card-header bg-white text-primary text-center">
                            Request and Return History
                        </div>
                        
                        <div class="card-body" style="max-height:300px; overflow:scroll;">
                            <div class="list-group m-t-35">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-bordered bordered text-left">
                                        <thead>
                                        <tr>
                                            <th style="width:15%;" class="text-left">Overdue&nbsp;By</th>
                                            <th style="width:20%;" class="text-left">Item</th>
                                            <th style="width:15%;" class="text-left">Quantity </th>
                                            <th style="width:10%;" class="text-left">Received/Returned</th>
                                            <th style="width:30%;" class="text-left">Project&nbsp;Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inventory_history as $inventory_history)
                                            <tr>
                                                <td>{{ date('d M Y', strtotime($inventory_history->created_at)) }}</td>
                                                <td><a href="#">{{ $inventory_history->inventoryItem->name }}</a></td>
                                                <td>{{ $inventory_history->quantity }}</td>
                                                <td>{{ date('d M Y', strtotime($inventory_history->return_date)) }}</td>
                                                <td>{{ $inventory_history->inventory->project->name }}</td>
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
@stop

@section('footer_scripts')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@stop

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection