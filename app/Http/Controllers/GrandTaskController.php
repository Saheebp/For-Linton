<?php

namespace App\Http\Controllers;

use App\Models\GreatTask;
use App\Models\GrandTask;

use Illuminate\Http\Request;

class GrandTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrandTask  $grandTask
     * @return \Illuminate\Http\Response
     */
    public function show(GrandTask $grandTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrandTask  $grandTask
     * @return \Illuminate\Http\Response
     */
    public function edit(GrandTask $grandTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrandTask  $grandTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrandTask $grandTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrandTask  $grandTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrandTask $grandTask)
    {
        //
    }


    public function updateTime(Request $request, Task $task)
    {
        $validated = $request->validate([
            'cost' => 'required|string|max:255'
        ]);

        try 
        {
            $task->update([
                'actual_cost' => $request->cost,
            ]);
            $task->save();

            return back()->with('success', 'Task Cost updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task Cost");
        }
    }

    public function updateStatus(Request $request, GrandTask $grandtask)
    {
        
        $validated = $request->validate([
            'status' => 'required|string|max:255'
        ]);
        
        $greattasks = GreatTask::where('grand_task_id',$grandtask->id)
        ->where('status_id', '!=', config('completed'))->get();
        
        //dd($greattasks);
        
        if (!$greattasks->isEmpty()) {
            return back()->with('error', "Oops, You cannot update this Task status due to pending great tasks");
        }

        try 
        {
            $grandtask->update([
                'status_id' => $request->status,
            ]);
            $grandtask->save();

            $data = array();
            $data['body'] = auth()->user()->name." Updated status of a Task(grand) | ".$grandtask->name." on Project : ".$grandtask->project->id." [".$grandtask->project->name."]";
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = $grandtask->id;
            $data['great_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;

            $data['emails'] = $this->getTeamEmails($grandtask->id); 
            $this->createLog($data);
            $this->CreateNotification($data);


            return back()->with('success', 'Task Status updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating Task Status");
        }
    }

    public function sendReminderMember(Request $request, GrandTask $grandtask)
    {
        try 
        {
            $member = ProjectMember::find($request->member);
            $grandtask = GrandTask::find($request->grandtask);
            $user = User::find($member->user_id);
            
            $data = array();
            $data['body'] = auth()->user()->name." sent a reminder to ".$user->name." on Task : ".$grandtask->id." [".$grandtask->name."]";
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = $grandtask->id;
            $data['great_task_id'] = NULL;

            $data['user_id'] = auth()->user()->id;

            $data['emails'] = $this->getIndividualEmails($user->id);
            $this->createLog($data);
            $this->CreateNotification($data);

            return back()->with('success', 'Reminder sent successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Sending reminder");
        }
    }

    public function getTeamEmails($grand_task_id)
    {
        try 
        {
            $emails = Array();
            $members = GrandTaskMember::where('grand_task_id', $grand_task_id)->get();
            foreach ($members as $member) {
                $emails[] = $member->user()->email;
            }
            return $emails;
        }
        catch (\Exception $e) 
        {
            return false;
        }
    }

    public function getIndividualEmails($user_id)
    {
        try 
        {
            $emails = Array();
            $user = User::find($user_id);
            $emails[] = $user->email;
            return $emails;
        }
        catch (\Exception $e) 
        {
            return false;
        }
    }
}
