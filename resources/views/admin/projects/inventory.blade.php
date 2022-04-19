@extends('layouts.project')

@section('page')
    <div class="tab-pane p-3" id="tab7">
        <a class="btn btn-sm btn-outline-success float-right mt-1" href="{{ route('projects.inventory.print', $project) }}">Print Summary</a>
        
        <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Inventory Requests</h4>
        <!-- <p class="card-text">Items available for this project</p> -->
        
        <table id="example1" class="table">
            <thead>
                <tr>
                    <th style="width:10%;">Date </th>
                    <th style="width:20%;">Name </th>
                    <th style="width:40%;">Purpose</th>
                    <th style="width:10%;">Quantity</th>
                    <th style="width:10%;">Status</th>
                    <th style="width:10%;" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($project->inventory->requests as $request)
                    <tr>
                        <td>
                            {{ $request->created_at }}
                        </td>
                        <td>
                            {{ $request->user->name}}
                        </td>
                        <td>
                            {{ $request->purpose ?? '' }}
                        </td>
                        <td>
                            {{ $request->quantity ?? '' }}
                        </td>
                        <td>
                            <span class="badge badge-{{ $request->status->style }}">{{ $request->status->name }}</span>
                        </td>
                        <td class="pr-1 pl-1">
                            <a class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#manageRequest{{ $request->id }}">Manage</a>
                            <div class="modal fade" id="manageRequest{{ $request->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel">Request for : {{ $request->inventoryItem->name }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="form-horizontal" action="#" method="POST">
                                        @csrf
                                            <fieldset>
                                                <div class="modal-body">
                                                    
                                                    <input value="{{ $request->inventory_item_id }}" hidden readonly name="inventory_item_id">
                                                    <input value="{{ $project->inventory->id }}" hidden readonly name="inventory_id">
                                                        
                                                    <div class="col-12">
                                                        <label for="subject1" class="col-form-label">
                                                            Action
                                                        </label>
                                                        <div class="input-group">
                                                            <select class="form-control" name="member" required>
                                                                <option value="">-- Select --</option>
                                                                <option value="{{ $approve }}">{{ $approve }}</option>
                                                                <option value="{{ $unapprove }}">{{ $unapprove }}</option>
                                                            </select>
                                                        </div>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Inventory Items</h4>
        <!-- <p class="card-text">Items available for this project</p> -->
        
        <table id="example1" class="table">
            <thead>
                <tr>
                    <th style="width:40%;">Name </th>
                    <th style="width:10%;">Category</th>
                    <th style="width:10%;">Quantity</th>
                    <th style="width:10%;">Available</th>
                    <th style="width:5%;">Status</th>
                    <th style="width:25%;" class="text-center" colspan="6">Action</th>
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
                        <td class="pr-1 pl-1">
                            @if($item->status_id != $returned)
                            <a class="btn btn-sm btn-outline-success text-right" data-toggle="modal" data-target="#DisburseItem{{ $item->id }}">Disburse</a>
                            @endif
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
                                                                @foreach ($project->members as $member)                                                                                                    
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
                        <td class="pr-1 pl-1">
                            @if($item->status_id != $returned)
                            <a class="btn btn-sm btn-outline-warning text-right" data-toggle="modal" data-target="#ReturnItem{{ $item->id }}">Return to Inventory</a>
                            @endif
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
                                                                @foreach ($project->members as $member)                                                                                                    
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
                                                            <input id="quantity" value="{{ $item->quantity - $item->available }}" min="1"  class="form-control" name="quantity">
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
                        <td class="pr-1 pl-1">
                            @if($item->status_id != $returned)
                            <a class="btn btn-sm btn-outline-warning text-right" data-toggle="modal" data-target="#ReturnWarehouseItem{{ $item->id }}">Return to Warehouse</a>
                            @endif
                            <div class="modal fade" id="ReturnWarehouseItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel">Return {{ $item->name }} to Warehouse</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="form-horizontal" action="{{ route('items.warehousereturn') }}" method="POST">
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
                                                                @foreach ($project->members as $member)                                                                                                    
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
                                                            <input id="quantity" value="{{ $item->available }}" min="1" class="form-control" name="quantity">
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

                        <td class="pr-1 pl-1">
                            <a class="btn btn-sm btn-outline-secondary text-right" data-toggle="modal" data-target="#ItemRequest{{ $item->id }}">Item Request</a>
                            <div class="modal fade" id="ItemRequest{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel">Request {{ $item->name }} from Inventory</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="form-horizontal" action="{{ route('items.requests') }}" method="POST">
                                        @csrf
                                            <fieldset>
                                                <div class="modal-body">
                                                    
                                                    <input value="{{ $item->id }}" hidden readonly name="inventory_item_id">
                                                    <input value="{{ $project->inventory->id }}" hidden readonly name="inventory_id">
                                                        
                                                    <div class="col-12">
                                                        <label for="subject1" class="col-form-label">
                                                            Name
                                                        </label>
                                                        <div class="input-group">
                                                            <input id="name" value="{{ auth()->user()->name }}" class="form-control" name="name">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="subject1" class="col-form-label">
                                                            Quantity
                                                        </label>
                                                        <div class="input-group">
                                                            <input id="quantity" value="{{ $item->available }}" min="1"  class="form-control" name="quantity">
                                                        </div>
                                                        @error('quantity')
                                                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="subject1" class="col-form-label">
                                                            Desciption/Purpose of Request
                                                        </label>
                                                        <div class="input-group">
                                                            <textarea id="purpose" value="{{ old('purpose') }}" class="form-control" placeholder="" name="purpose" required></textarea>
                                                        </div>
                                                        @error('purpose')
                                                            <span class="text-danger">{{ $errors->first('purpose') }}</span>
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

                        <td class="pr-1 pl-1">
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
