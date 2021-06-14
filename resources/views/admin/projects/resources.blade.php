@extends('layouts.project')

@section('page')
    <div class="tab-pane p-3" id="tab5">
        <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.resources.print', $project) }}">Print Summary</a>
        <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Resources</h4>
        <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p> -->

        <button class="btn btn-raised btn-sm btn-secondary mt-3 mb-3 adv_cust_mod_btn"
            data-toggle="modal" data-target="#modalUploadResource">Upload Resource
        </button>
        
        <div class="modal fade" id="modalUploadResource" role="dialog" aria-labelledby="modalLabelprimary">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header bg-secondary">
                        <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Upload Resource to Project</h4>
                    </div>
                    <form class="form-horizontal" action="{{ route('projects.upload', $project)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <fieldset>
                            <div class="modal-body">
                                
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="input-group mb-1">
                                            <input class="form-control col-12" type="file" name="file" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <label for="subject1" class="col-form-label">
                                            File Name
                                        </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control col-12" type="text" name="name" required>
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-12">
                                        <label for="subject1" class="col-form-label">
                                            File Description
                                        </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control col-12" type="text" name="description" required>
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

        @if ($project->resources->count() != 0)
        <table id="example1" class="table table-striped">
            <thead>
                <tr>
                    <th style="width:30%;">Name</th>
                    <th style="width:10%;">Type</th>
                    <th style="width:40%;">Description</th>
                    <th style="width:15%;">File</th>
                    <th style="width:5%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project->resources as $resource)
                    <tr>
                        <td class="text-left">
                            {{ $resource->name ?? '' }}
                        </td>
                        <td style="width:10%;">
                            {{ $resource->type ?? '' }}
                        </td>
                        <td style="width:40%;">
                            {{ $resource->description ?? '' }}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('projects.download', $resource->id)}}"><i class="fa fa-download"></i> Download</a>
                        </td>
                        <td style="width:5%;">
                            <a class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@stop