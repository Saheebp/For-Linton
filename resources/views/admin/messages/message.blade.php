@extends('admin.messages.index')

@section('content_message')

<div class="card-header bg-white">
    <div class="tab-pane p-3" id="tab9">
            <h2 class="card-title" style="margin-bottom:30px; margin-top:30px;"> Project: <bold>{{ $the_message->project->name}}</bold></h4>
            
            <div class="table-responsive text-nowrap overflow-auto ">   

                <table id="example1" class="table table-striped">
                    <tbody>
                        @foreach($the_messages as $msg)
                        <tr>
                            <td>
                                <span class="badge badge-secondary">{{ $msg->creator->name }}</span>
                                <br>

                                {{ $msg->body }}<br>
                                <b>{{ date('d M Y, h:ia', strtotime($msg->created_at)) }}</b>
                            </td>
                        </tr>
                        @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <td class="sent_to_mailview">
        @can('projects.team.message')
        <button id="replyBtn" class="btn btn-sm btn-outline-primary text-center" data-toggle="modal" data-target="#ReplyMessageTo{{ $the_message->creator_id == auth()->user()->id ? $the_message->receiver_id : $the_message->creator_id }}">Reply</button>
        @endcan
                
        <div class="modal fade" id="ReplyMessageTo{{ $the_message->creator_id == auth()->user()->id ? $the_message->receiver_id : $the_message->creator_id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel">Reply Message</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action="{{ route('messages.store') }}" method="POST">
                    @csrf
                        
                        <input name="project_id" value="{{ $the_message->project_id }}" hidden readonly>
                        <input name="receiver" value="{{ $the_message->creator_id == auth()->user()->id ? $the_message->receiver_id : $the_message->creator_id }}" hidden readonly> 

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
</div>
@endsection

<script>
    window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
</script>