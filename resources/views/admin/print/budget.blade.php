<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <title>{{ $settings['name'] ?? '' }}</title>

   <style>
        @media print{
            #printPageButton {
                display:none;
            }

            @page { margin:0;}

        }
   </style>
</head>

  <body style="margin-top:0px; font-size:20px;";>

    <div style="padding:20px; padding-bottom:15px;">

        <h2 align="center" style="margin-bottom:0px; margin-top:0px;">{{ $settings['name'] }}</h2>
        <p align="center" style="margin-bottom:1px; margin-top:1px; font-size:12px;">{{ $settings['address'] }}</p>

        <hr width="100%">
        
        <p align="center" style="margin-bottom:1px; margin-top:1px; font-size:14px;">Printed on: {{ Carbon\Carbon::now() }}</p>
        <h3 align="center" style="text-transform:uppercase;">PROJECT BUDGET REPORT</h3>
        <div class="row">
            <table border="1" cellspacing="0" width="100%" style="margin-top:0px;">
                <tbody>
                    <tr>
                        <td width="34%"><b>Title: </b><br><tag class="">{{ $project->name ?? '' }}</tag> </td>
                        <td width="33%"><b>Objective: </b><br><tag class="">{{ $project->objective ?? '' }}</tag> </td>
                        <td width="33%"><b>Budget: </b><br><tag class="">&#8358;{{ number_format(floatval($project->budget), 2) }}</tag></td>
                    </tr>
                    <tr>
                        <td><b>State: </b><br>{{ $project->state ?? '' }}, {{ $project->lga ?? '' }}</td>
                        <td><b>Owner: </b><br>{{ $project->sponsor_name }}</td>
                        <td><b>Project Type:</b><br>{{ $project->type }}</td>
                    </tr>

                    <tr>
                        <td><b>Start: </b><br><tag class="text-success">{{ date('d M Y', strtotime($project->start)) }}</tag> </td>
                        <td><b>End: </b><br><tag class="text-danger">{{ date('d M Y', strtotime($project->end)) }}</tag></td>
                        <td><b>Project Status: </b><br><span class="badge badge-{{ $project->status->style }}">{{ $project->status->name ?? '' }}</span></td>
                    </tr>
                    <tr>
                        <td><b>Manager: </b><br>{{ $project->manager->name ?? '' }}</td>
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
        
        <hr width="100%">
        <h4 align="left" style="text-transform:uppercase;">Budget</h4>
        <div class="row">
            <table border="0" cellspacing="0" width="100%" style="margin-top:0px;">
                <thead style="text-align:left;">
                    <tr>
                        <th>
                            Estimated Cost
                        </th>
                        <th>
                            Total Allocated
                        </th>

                        <th>
                            Total Spent
                        </th>

                        <th>
                            Cost
                        </th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td>
                            &#8358;{{ number_format(floatval($project->budget ?? 0), 2) }}
                        </td>
                        <td>
                            &#8358;{{ number_format(floatval($project->tasks->sum('budget') ?? 0), 2) }}
                        </td>
                        <td>
                            &#8358;{{ number_format(floatval($project->subtasks->sum('actual_cost') ?? 0), 2) }}
                        </td>
                        <td>
                            &#8358;{{ number_format(floatval($project->budget - $project->tasks->sum('budget') ?? 0), 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr width="100%">
            <h5 align="left" style="text-transform:uppercase;">Breakdown</h5>
            <table border="1" cellspacing="0" width="100%" style="margin-top:0px; text-align:left;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th style="width:20%;">Budget</th>
                        <th style="width:20%;">Actual Cost </th>
                        <th style="width:20%;">Variance</th>
                        <th style="width:5%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 1)
                    @foreach($project->tasks as $task)
                    <tr style="background-color:#e6e6e6;">
                        <td>
                            Task {{ $i }}
                        </td>
                        <td>
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
                            {{ $task->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <h5><b>SUB TASKS</b></h5>
                            <table border="0" cellspacing="0" width="100%" style="margin-top:0px; margin-bottom:10px; text-align:left;">
                                <thead>
                                    <tr style="font-size:16px;">
                                        <th>Title</th>
                                        <th style="width:20%;">Budget</th>
                                        <th style="width:20%;">Actual Cost </th>
                                        <th style="width:20%;">Variance</th>
                                        <th style="width:5%;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($task->subtasks as $subtask)
                                    <tr>
                                        <td>
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
                                            {{ $subtask->status->name ?? '' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    @php ($i = $i + 1)
                    @endforeach
                <tbody>
            </table>
        </div>
        <hr width="100%">
        
        <a href="#"><button id="printPageButton" style="float-right">Back to Project</button></a> &nbsp;&nbsp;
        <button id="printPageButton" style="float-right" href="#" onclick="window.print();">Print Page</button>
    </div>
</body>

</html>