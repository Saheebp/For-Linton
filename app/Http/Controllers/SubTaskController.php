<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\SubTask;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;

//traits
// use App\Traits\AppStatus;
// use App\Traits\CreateNotification;

class SubTaskController extends Controller
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //'budget' => 'required|string',
        ]);

        $task = Task::find($request->task_id);
        if ($task == null) {
            return back()->with('error', 'Specific task not found.');
        }
        
        try 
        {
            $subtask = SubTask::create([
                'name' => $request->name,
                'description' => $request->description,
                //'budget' => $request->budget,
                'start' => $request->start,
                'end' => $request->end,
                'project_id' => $request->project_id,
                'task_id' => $request->task_id,
                'status_id' => config('pending'),
                'preceedby' => ($request->preceedby == null) ? null : $request->preceedby,
                'succeedby' => ($request->succeedby == null) ? null : $request->succeedby,
            ]);

            $data = array();
            $data['body'] = auth()->user()->name." created a Sub Task : ".$request->name.", Details: ".$request->start."-".$request->end." on Project : ".$subtask->project->id." [".$subtask->project->name."]";
            $data['project_id'] = $request->project_id;
            $data['task_id'] = $request->task_id;
            $data['sub_task_id'] = $subtask->id;
            $data['user_id'] = auth()->user()->id;
            $data['emails'] = null;

            $this->createLog($data);
            $this->CreateNotification($data);
            
            activity()
            ->performedOn($subtask)
            ->causedBy(auth()->user())
            ->withProperties(['Sub Task' => $subtask->id])
            ->log(auth()->user()->name.' Created : '.$subtask->name );

            return back()->with('success', 'Sub Task created successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a Sub Task");
        } 
    }

    public function updateExecutor(Request $request, SubTask $subtask)
    {
        try 
        {
            $subtask->update([
                'executor_id' => $request->member
            ]);
            
            $user = User::find($request->member);

            $data = array();
            $data['body'] = auth()->user()->name." added ".$user->name." as executor for Sub Task : ".$subtask->name." on Project : ".$subtask->project->id." [".$subtask->project->name."], starting ".$subtask->start." and ending ".$subtask->end;
            $data['project_id'] = NULL;
            $data['task_id'] = $subtask->task->id;
            $data['sub_task_id'] = $subtask->id;
            $data['user_id'] = auth()->user()->id;
            
            $data['emails'] = $this->getIndividualEmails($user->id);
            $this->createLog($data);
            $this->CreateNotification($data);
            
            $subtask->save();
            
            return back()->with('success', 'Team Member updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating Sub Task");
        }
    }
    
    public function updateStatus(Request $request, SubTask $subtask)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255'
        ]);

        try 
        {
            $subtask->update([
                'status_id' => $request->status,
            ]);
            
            $subtask->save();

            return back()->with('success', 'Sub Task Status updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Sub Task Status");
        }
    }

    public function updateCost(Request $request, SubTask $subtask)
    {
        $validated = $request->validate([
            'cost' => 'required|string|max:255'
        ]);

        try 
        {
            $subtask->update([
                'actual_cost' => $request->cost,
            ]);
            $subtask->save();

            return back()->with('success', 'Sub Task Cost updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Sub Task Cost");
        }
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

    public function comment(Request $request)
    {
        try 
        {
            Comment::create([
                'body' => $request->comment,
                'project_id' => $request->project_id,
                'task_id' => $request->task_id,
                'sub_task_id' => $request->sub_task_id,
                'creator_id' => auth()->user()->id
            ]);

            return back()->with('success', 'Comment added successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error adding Comment");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function show(SubTask $subTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTask $subTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubTask $subTask)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start' => 'required|string|max:255',
            'end' => 'required|string|max:255',
        ]);

        try 
        {
            //dd($request);
            $subtask = SubTask::find($request->sub_task_id);
            $subtask->update([

                'name' => $request->name,
                'start' => $request->start,
                'end' => $request->end
            ]);
            $subtask->save();
            
            $data = array();
            $data['body'] = auth()->user()->name." updated Task ".$subtask->name."| starting: ".$subtask->start." and ending: ".$subtask->end;
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = $subtask->id;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            //$data['body'] = "Be reminded on your Project Delivery: ".$project->id." [".$project->name."]";
            $data['emails'] = null; 
            $this->CreateNotification($data);

            return back()->with('success', 'Project Updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating a Project");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTask $subTask)
    {
        //dd("hi");
    }

    public function sendReminderMember(Request $request)
    {
        try 
        {
            //$member = ProjectMember::find($request->member);
            $subtask = SubTask::find($request->id);
            //$user = User::find($member->user_id);
            
            $data = array();
            $data['body'] = auth()->user()->name." sent a reminder to team members on Task : ".$subtask->id." [".$subtask->name."], starting ".$subtask->start." and ending ".$subtask->end;
            $data['project_id'] = NULL;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = $subtask->id;
            $data['user_id'] = auth()->user()->id;

            $this->createLog($data);

            $data['body'] = "Be reminded on your Task : ".$subtask->id." [".$subtask->name."]";
            $data['emails'] = $this->getTeamEmails($subtask->id);
            $this->CreateNotification($data);

            return back()->with('success', 'Reminder sent successfully to Task Members.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Sending reminder to Task Members");
        }
    }

    public function getTeamEmails($sub_task_id)
    {
        try 
        {
            $emails = Array();
            $members = SubTaskMember::where('sub_task_id', $sub_task_id)->get();
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
