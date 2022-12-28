<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // dd(auth()->user()->id);
        $inbox = Message::where('receiver_id', auth()->user()->id)
            ->orWhere('creator_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')->paginate(10);
            
        $project_inbox = Message::where('receiver_id', auth()->user()->id)
            ->orWhere('creator_id', auth()->user()->id)
            ->select('project_id')
            ->groupBy('project_id')->get();

            return view('admin.messages.messages', [
            'project_inbox' => $project_inbox,
            'inbox' => $inbox
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255'
        ]);
        
        try 
        {
            Message::create([
                'body' => $request->body,
                'project_id' => $request->project_id,
                'task_id' => $request->task_id,
                'receiver_id' => $request->receiver,
                'creator_id' => auth()->user()->id
            ]);

            return back()->with('success', 'Message sent successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error sending Message");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function showMessage($message_id)
    {
        try {
            $the_message = Message::where('id', $message_id)->first();

            if ($the_message != null) 
            {
                $the_messages = Message::where('project_id', $the_message->project_id)
                    ->where(function ($query) use ($the_message) {
                        $query->where('receiver_id', $the_message->receiver_id);
                        $query->Where('creator_id', $the_message->creator_id);
                    })
                    ->orWhere(function ($query1) use ($the_message) {
                        $query1->where('receiver_id', $the_message->creator_id);
                        $query1->Where('creator_id', $the_message->receiver_id);
                    })->orderBy('created_at', 'asc')->get();

                if ($the_messages == null)
                    return back()->with('error', 'Message not found for that request, try again');
                
                    $the_message->update([
                        'read' => true,
                    ]);
                    $the_message->save();

                $inbox = Message::where('receiver_id', auth()->user()->id)
                    ->orWhere('creator_id', auth()->user()->id)
                    ->orderBy('created_at', 'asc')->paginate(10);

                $project_inbox = Message::where('receiver_id', auth()->user()->id)
                    ->orWhere('creator_id', auth()->user()->id)
                    ->select('project_id')
                    ->groupBy('project_id')->get();

                return view('admin.messages.message', [
                    'inbox' => $inbox,
                    'project_inbox' => $project_inbox,
                    'the_message' => $the_message,
                    'the_messages' => $the_messages
                ]);
            }
            return back()->with('error', 'Message not found for that request, try again');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return back()->with('error', 'Oops, Error Occured');
        }
    }

    public function search(Request $request)
    {
        $filter = $request->filter;
        try {

            $user_ids = User::where('name', 'like', '%'.$filter.'%')->get();
            $project_ids = Project::where('name', 'like', '%'.$filter.'%')->get();

            $inbox = Message::where('receiver_id', auth()->user()->id)
                ->orWhere('creator_id', auth()->user()->id)
                ->where(function ($query) use ($user_ids, $project_ids){
                    $query//->WhereIn('project_id', $project_ids)
                    ->whereIn('creator_id', $user_ids);
                    $query->orWhereIn('receiver_ids', $user_ids);
                })->orderBy('created_at', 'desc')->paginate(10);
                
            $project_inbox = Message::where('receiver_id', auth()->user()->id)
                ->orWhere('creator_id', auth()->user()->id)
                ->select('project_id')
                ->groupBy('project_id')->get();

            return view('admin.messages.messages', [
                'project_inbox' => $project_inbox,
                'inbox' => $inbox
            ]);
            // return back()->with('error', 'Message not found for that request, try again');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return back()->with('error', 'Oops, Error Occured');
        }
    }

}
