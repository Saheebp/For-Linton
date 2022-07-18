<?php

namespace App\Http\Controllers;

use App\Models\GreatTask;
use Illuminate\Http\Request;

class GreatTaskController extends Controller
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
     * @param  \App\Models\GreatTask  $greatTask
     * @return \Illuminate\Http\Response
     */
    public function show(GreatTask $greatTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GreatTask  $greatTask
     * @return \Illuminate\Http\Response
     */
    public function edit(GreatTask $greatTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GreatTask  $greatTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start' => 'required|string|max:255',
            'end' => 'required|string|max:255',
        ]);

        try 
        {
            $greatTask = GreatTask::find($request->great_task_id);
            $greatTask->update([
                'name' => $request->name,
                'start' => $request->start,
                'end' => $request->end
            ]);
            $greatTask->save();
            
            $data = array();
            $data['body'] = auth()->user()->name." updated Task ".$greatTask->name."| starting: ".$greatTask->start." and ending: ".$greatTask->end;
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['grand_task_id'] = NULL;
            $data['great_task_id'] = $greatTask->id;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            //$data['body'] = "Be reminded on your Project Delivery: ".$project->id." [".$project->name."]";
            $data['emails'] = null; 
            $this->CreateNotification($data);

            return back()->with('success', 'Task Updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating a Task");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GreatTask  $greatTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(GreatTask $greatTask)
    {
        //
    }

    public function updateTime(Request $request, GreatTask $greattask)
    {
        $validated = $request->validate([
            'cost' => 'required|string|max:255'
        ]);

        try 
        {
            $greattask->update([
                'actual_cost' => $request->cost,
            ]);
            $greattask->save();

            return back()->with('success', 'Task Cost updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task Cost");
        }
    }

    public function updateStatus(Request $request, GreatTask $greattask)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255'
        ]);
        
        try 
        {
            $greattask->update([
                'status_id' => $request->status,
            ]);
            $greattask->save();

            $data = array();
            $data['body'] = auth()->user()->name." Updated status of a Task(great) ".$greattask->name." on Project : ".$greattask->project->id." [".$greattask->project->name."], starting ".$greattask->start." and ending ".$greattask->end;
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = NULL;
            $data['great_task_id'] = $greattask->id;
            $data['user_id'] = auth()->user()->id;

            $data['emails'] = $this->getTeamEmails($greattask->id);
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

    public function sendReminderMember(Request $request)
    {
        try 
        {
            //$member = ProjectMember::find($request->member);
            $greattask = GreatTask::find($request->id);
            //$user = User::find($member->user_id);
            
            $data = array();
            $data['body'] = auth()->user()->name." sent a reminder to team members on Task : ".$greattask->id." [".$greattask->name."], starting ".$greattask->start." and ending ".$greattask->end;
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = NULL;
            $data['great_task_id'] = $greattask->id;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['body'] = "Be reminded on your Task : ".$greattask->id." [".$greattask->name."]";
            $data['emails'] = $this->getTeamEmails($greattask->id);
            $this->CreateNotification($data);

            return back()->with('success', 'Reminder sent successfully to Task Members.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Sending reminder to Task Members");
        }
    }

    public function getTeamEmails($great_task_id)
    {
        try 
        {
            $emails = Array();
            $members = GreatTaskMember::where('great_task_id', $great_task_id)->get();
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
