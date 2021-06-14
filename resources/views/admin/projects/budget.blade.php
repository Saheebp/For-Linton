@extends('layouts.project')

@section('page')
                                        <div class="tab-pane p-3" id="tab6">
                                            <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.budget.print', $project) }}">Print Summary</a>
                                            <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Budget Analysis</h4>
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
@stop
