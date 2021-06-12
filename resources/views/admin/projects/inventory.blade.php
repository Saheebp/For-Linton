@extends('layouts.project')

@section('page')
                                        <div class="tab-pane p-3" id="tab7">
                                            <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Inventory</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            <table id="example1" class="">
                                                <thead>
                                                    <tr>
                                                        <th style="width:40%;">Name </th>
                                                        <th style="width:10%;">Category</th>
                                                        <th style="width:10%;">Quantity</th>
                                                        <th style="width:10%;">Available</th>
                                                        <th style="width:5%;">Status</th>
                                                        <th style="width:15%;" class="text-center" colspan="3">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($project->inventory->items as $item)
                                                        <tr>
                                                            <td>
                                                                {{ $item->name}}
                                                            </td>
                                                            <td>
                                                                {{ $item->category->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->quantity ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $item->available ?? '' }}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-{{$item->status->style }}">{{ $item->status->name }}</span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#DisburseItem{{ $item->id }}">Disburse</a>
                                                                <div class="modal fade" id="DisburseItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Disburse {{ $item->name }}</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <form class="form-horizontal" action="{{ route('items.disburse') }}" method="POST">
                                                                            @csrf
                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                        
                                                                                        <input value="{{ $item->id }}" hidden readonly name="inventory_item_id">
                                                                                        <input value="{{ $project->inventory->id }}" hidden readonly name="inventory_id">
                                                                                            
                                                                                        <div class="col-12">
                                                                                            <label for="subject1" class="col-form-label">
                                                                                                Received By
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <select class="form-control" name="member" required>
                                                                                                    <option value="">-- Select Member --</option>
                                                                                                    @foreach ($members as $member)                                                                                                    
                                                                                                    <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <label for="subject1" class="col-form-label">
                                                                                                Quantity
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <input id="quantity" value="{{ old('quantity') ?? $item->available }}" min="1" max="{{ $item->available }}"  class="form-control" name="quantity">
                                                                                            </div>
                                                                                            @error('quantity')
                                                                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <button class="btn btn-sm btn-responsive text-white layout_btn_prevent btn-success">Yes, Allocate</button>
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
                                                                <a class="btn btn-sm btn-outline-warning text-right" data-toggle="modal" data-target="#ReturnItem{{ $item->id }}">Return</a>
                                                                <div class="modal fade" id="ReturnItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">Return {{ $item->name }}</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <form class="form-horizontal" action="{{ route('items.return') }}" method="POST">
                                                                            @csrf
                                                                                <fieldset>
                                                                                    <div class="modal-body">
                                                                                        
                                                                                        <input value="{{ $item->id }}" hidden readonly name="inventory_item_id">
                                                                                        <input value="{{ $project->inventory->id }}" hidden readonly name="inventory_id">
                                                                                            
                                                                                        <div class="col-12">
                                                                                            <label for="subject1" class="col-form-label">
                                                                                                Returned By
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <select class="form-control" name="member" required>
                                                                                                    <option value="">-- Select Member --</option>
                                                                                                    @foreach ($members as $member)                                                                                                    
                                                                                                    <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <label for="subject1" class="col-form-label">
                                                                                                Quantity
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <input id="quantity" value="{{ old('quantity') }}" min="1"  class="form-control" name="quantity">
                                                                                            </div>
                                                                                            @error('quantity')
                                                                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-lg-12">
                                                                                                <button class="btn btn-sm btn-responsive text-white layout_btn_prevent btn-success">Yes, Return</button>
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
                                                                <a class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#ItemHistory{{ $item->id }}">History</a>
                                                                <div class="modal fade" id="ItemHistory{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                                aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="modalLabel">{{ $item->name}} disburse/Refund History</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <table id="example1" class="table table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="width:10%;">Action </th>
                                                                                            <th style="width:40%;">Disburser</th>
                                                                                            <th style="width:40%;">Receiver</th>
                                                                                            <th style="width:10%;">Quantity</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach($item->itemActivities as $activity)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    {{ $activity->type}}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $activity->user->name ?? '' }}<br>
                                                                                                    <tag style="font-size:10px;">{{ $activity->created_at }}</tag>
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $activity->receiver->name ?? '' }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $activity->quantity ?? '' }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
@stop
