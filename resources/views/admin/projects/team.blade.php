@extends('layouts.project')

@section('page')
<div class="tab-pane p-3 " id="tab1">
    <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.team.print', $project) }}">Print Summary</a>
    <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Project Team Members</h4>
    <!-- <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </p> -->

    <button class="btn btn-sm btn-secondary float-left m-1  mb-3" data-toggle="modal" data-target="#addMemberToProject">Add Member</button>
    <div class="modal fade" id="addMemberToProject" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel">Add Member to Project : </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" action="{{ route('projects.addMember', $project)}}" method="POST">
                @csrf
                <fieldset>
                    <div class="modal-body">
                        
                        <input type="text" name="project_id" value="{{ $project->id }}" hidden readonly>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="subject1" class="col-form-label">
                                    Select New Project Member
                                </label>
                                <div class="input-group">
                                    <select class="form-control" name="member" required>
                                        <option value="">-- Select Member --</option>
                                        @foreach ($staff as $member)                                                                                                    
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
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

    <table id="example1" class="table">
        <thead>
            <tr>
                <th style="width:5%;">SNo</th>
                <th style="width:35%;">Name </th>
                <th style="width:20%;">Designation </th>
                <th style="width:20%;" colspan="3" class="text-right"> &nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($project->members as $member)
            <tr>
                <td class="text-left">
                    {{ $i }}
                </td>

                <td class="text-left">
                    {{ $member->user->name ?? '' }}
                </td>

                <td class="text-left">
                    {{ $member->designation->name ?? '' }}
                </td>

                <td>
                    <button class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#SendPersonalMessageTo{{$member->id}}">Send Message</button>
                    <div class="modal fade" id="SendPersonalMessageTo{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">Send Message to {{$member->user->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" action="{{ route('messages.store') }}" method="POST">
                                @csrf
                                    
                                    <input name="project_id" value="{{ $project->id }}" hidden readonly>
                                    <input name="receiver" value="{{ $member->user->id }}" hidden readonly> 

                                    <fieldset>
                                        <div class="modal-body">
                                            
                                            <div class="col-12">
                                                <label for="subject1" class="col-form-label">
                                                    Message
                                                </label>
                                                <div class="input-group">
                                                    <textarea id="body" value="{{ old('body') }}" class="form-control" placeholder="" name="body"></textarea>
                                                </div>
                                                @error('body')
                                                    <span class="text-danger">{{ $errors->first('body') }}</span>
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
                </td>
                
                <td>
                    <button class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#changeMemberRole{{$member->id}}">Change Role</button>
                    <div class="modal fade" id="changeMemberRole{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">Update Role for {{$member->user->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" action="{{ route('projects.updateRole')}}" method="POST">
                                @csrf
                                    <fieldset>
                                        <div class="modal-body">
                                        
                                        <input name="member" value="{{$member->id}}" hidden readonly>
                                        <input name="project" value="{{$project->id}}" hidden readonly>

                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Designation
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </span>
                                                <select class="form-control col-12" name="designation">
                                                    <option value=""> -- Select Designation --</option>
                                                    @foreach($designations as $designation)
                                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                </td>

                <td>
                    <button class="btn btn-sm btn-outline-danger text-right" data-toggle="modal" data-target="#removeMemberFromTeam{{$member->id}}">Remove</button>
                    <div class="modal fade" id="removeMemberFromTeam{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">Remove {{$member->user->name}} from Project</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" action="{{ route('projects.removeMember')}}" method="POST">
                                @csrf
                                    <fieldset>
                                        <div class="modal-body">
                                            <input name="member" value="{{$member->id}}" hidden readonly>
                                            <input name="project" value="{{$project->id}}" hidden readonly>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-sm btn-responsive layout_btn_prevent btn-primary">Yes, Remove</button>
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
            <?php $i=$i+1; ?>
            @endforeach
        </tbody>
    </table>
</div>
@stop
