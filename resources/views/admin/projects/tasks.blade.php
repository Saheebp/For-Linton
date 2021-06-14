@extends('layouts.project')

@section('page')
<div class="tab-pane p-3 active" id="tab2">
    <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.tasks.print', $project) }}">Print Summary</a>
    <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Project Tasks & Processes</h4>
    
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
@stop
