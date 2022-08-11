@extends('layouts.project')

@section('page')
    <div class="tab-pane p-3" id="tab9">
        <!-- <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.timeline.print', $project) }}">Print Summary</a> -->
        <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Notifications <tag style="font-size:12px">({{ $filter}} first)</tag></h4>
        <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p> -->
        
        <?php
            // $totalweeks = round(( strtotime($project->end) - strtotime($project->start)) / 3600 / 24 / 7);
        ?>

        <div class="table-responsive text-nowrap overflow-auto ">   
            
            <a class="btn btn-sm btn-outline-success float-right mt-1 mr-1 ml-1" href="{{ route('projects.notifications', [$project->id, 'latest']) }}">latest</a> 
            <a class="btn btn-sm btn-outline-primary float-right mt-1" href="{{ route('projects.notifications', [$project->id, 'oldest']) }}">oldest</a> <br><br>


            <table id="example1" class="table table-striped">
                <tbody>
                    @foreach($project->notifications as $notification)
                    <tr>
                        <td>
                            @if ($notification->project_id != NULL)
                                <span class="badge badge-secondary">project</span>
                            @elseif ($notification->task_id != NULL)
                                <span class="badge badge-secondary">task</span>
                            @elseif ($notification->sub_task_id != NULL)
                                <span class="badge badge-secondary">sub task</span>
                            @elseif ($notification->grand_task_id != NULL)
                                <span class="badge badge-secondary">grand</span>
                            @elseif ($notification->great_task_id != NULL)
                                <span class="badge badge-secondary">great</span>
                            @endif
                            <br>

                            {{ $notification->body }}<br>
                            <b>{{ date('d M Y, h:ia', strtotime($notification->created_at)) }}</b>
                        </td>
                    </tr>
                    @endforeach
                        
                </tbody>
            </table>
        </div>
    </div>
@stop
