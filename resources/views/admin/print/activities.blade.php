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
        <h3 align="center" style="text-transform:uppercase;">PROJECT ACTIVITY LOG</h3>
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
        <h4 align="left" style="text-transform:uppercase;">Tasks</h4>
        <div class="row">
            
            @if ($project->logs->count() != 0)
            <table border="0" cellspacing="0" width="100%" style="margin-top:0px; text-align:left;">
                <thead>
                    <tr>
                        <th style="width:30%;">Date</th>
                        <th style="width:70%;">Activity</th>
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
            @endif
        </div>
        
        <a href="#"><button id="printPageButton" style="float-right">Back to Project</button></a> &nbsp;&nbsp;
        <button id="printPageButton" style="float-right" href="#" onclick="window.print();">Print Page</button>
    </div>
</body>

</html>