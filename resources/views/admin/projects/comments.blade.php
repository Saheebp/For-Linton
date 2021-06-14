@extends('layouts.project')

@section('page')
    <div class="tab-pane p-3" id="tab8">
        <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.comments.print', $project) }}">Print Summary</a>
        <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Comments</h4>
        <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p> -->

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
@stop
