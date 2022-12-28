@extends('admin.messages.index')

@section('content_message')
<div class="card-header bg-white">
    <div class="row">
        <div class="col-sm-6 col-12 m-t-10 dropdown_list_hover">
            <div class="btn-group float-left table-bordereds">
                <label class="custom-control custom-checkbox  mb-0 mr-0">
                    <input type="checkbox" class="custom-control-input select-all">
                    <span class="custom-control-indicator"></span>
                </label>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                </a>
                <ul class="dropdown-menu">
                    <li class="select-all1">
                        <span>All</span>
                    </li>
                    <li id="select-none">
                        <span>None</span>
                    </li>
                    <li id="mail_read">
                        <span>Read</span>
                    </li>
                    <li id="mail_unread">
                        <span>UnRead</span>
                    </li>
                    <li id="mail_starred">
                        <span>Starred</span>
                    </li>
                    <li id="mail_unstarred">
                        <span>Unstarred</span>
                    </li>
                </ul>
            </div>
            <div class="btn-group float-left table-bordered text-primary" id="refresh_inbox">
                <i class="fa fa-refresh"></i>
            </div>
        </div>
        <div class="col-sm-6 col-12">
            <form action="{{ route('messages.search') }}" method="post">
                <div class="input-group margin bottom">
                @csrf
                    <input type="text" class="form-control inbox_search_height m-t-10" value="" name="filter" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary inbox_search_height m-t-10">Search</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card-body m-t-25 p-d-0">
    <div class="tabs tabs-bordered tabs-icons">
        <!-- <ul class="nav nav-tabs">
            <li class="nav-item" id="primary2">
                <a href="#primary" class="nav-link active" data-toggle="tab"
                    aria-expanded="true"><i class="fa fa-inbox"></i> Primary</a>
            </li>
            <li class="nav-item" id="social2">
                <a href="#social" class="nav-link" data-toggle="tab"
                    aria-expanded="false"><i class="fa fa-group"></i> Social</a>
            </li>
            <li class="nav-item" id="promotions2">
                <a href="#promotions" class="nav-link" data-toggle="tab"
                    aria-expanded="false"><i class="fa fa-star"></i> Promotions</a>
            </li>
        </ul> -->
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane table-responsive reset padding-all fade active show" id="primary">
                <table class="table">
                    <tbody>
                        @foreach ($inbox as $message)
                        <tr class="mail-unread">
                            <td>
                                <div class="checker m-l-20">
                                    <label class="custom-control custom-checkbox">
                                        <input name="checkbox" type="checkbox"
                                                class="custom-control-input ">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                            </td>
                            <td><i class="fa fa-star"></i></td>
                            <td class="sent_to_mailview">{{ $message->creator->name ?? '' }}</td>
                            <td class="sent_to_mailview">{{ $message->body }}</td>
                            <td class="sent_to_mailview">{{ $message->created_at }}</td>
                            <td class="sent_to_mailview">
                                @can('projects.team.message')
                                <button class="btn btn-sm btn-outline-primary text-right" data-toggle="modal" data-target="#SendMessage{{ $message->creator_id == auth()->user()->id ? $message->receiver_id : $message->creator_id }}">Reply</button>
                                @endcan
                                        
                                <div class="modal fade" id="SendMessage{{$message->creator_id == auth()->user()->id ? $message->receiver_id : $message->creator_id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Reply {{$message->creator_id == auth()->user()->id ? $message->receiver->name : $message->creator->name }}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" action="{{ route('messages.store') }}" method="POST">
                                            @csrf
                                                
                                                <input name="project_id" value="{{ $message->project_id }}" hidden readonly>
                                                <input name="receiver" value="{{ $message->creator_id == auth()->user()->id ? $message->receiver_id : $message->creator_id }}" hidden readonly> 

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
                                <a class="btn btn-dark btn-sm text-white  align-left" href="{{ route('messages.show', $message->id) }}">View</a>
                            </td>
                        </tr>
                        <!-- <tr class="mail-unread">
                            <td>
                                <div class="checker m-l-20">
                                    <label class="custom-control custom-checkbox">
                                        <input name="checkbox" type="checkbox"
                                                class="custom-control-input ">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                            </td>
                            <td><i class="fa fa-star"></i></td>
                            <td class="sent_to_mailview">Jaimie Doe</td>
                            <td class="sent_to_mailview">Where are you dude?!?</td>
                            <td class="sent_to_mailview"></td>
                            <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                        </tr>
                        <tr class="mail-unread">
                            <td>
                                <div class="checker m-l-20">
                                    <label class="custom-control custom-checkbox">
                                        <input name="checkbox" type="checkbox"
                                                class="custom-control-input ">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                            </td>
                            <td><i class="fa fa-star text-warning"></i></td>
                            <td class="sent_to_mailview">John Cena</td>
                            <td class="sent_to_mailview">Please confirm your registration</td>
                            <td class="sent_to_mailview"><i class="fa fa-paperclip"></i></td>
                            <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                        </tr>
                        <tr class="mail-unread">
                            <td>
                                <div class="checker m-l-20">
                                    <label class="custom-control custom-checkbox">
                                        <input name="checkbox" type="checkbox"
                                                class="custom-control-input ">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                            </td>
                            <td><i class="fa fa-star starred"></i></td>
                            <td class="sent_to_mailview">Office</td>
                            <td class="sent_to_mailview">Reminder about the Meeting for Today</td>
                            <td class="sent_to_mailview"></td>
                            <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                        </tr> -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection