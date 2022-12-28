<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\SubTask;
use App\Models\User;
use App\Models\Comment;
use App\Models\TaskMember;
use App\Models\Resource;

use Stevebauman\Location\Facades\Location;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = TaskMember::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $tasks = Task::all();
        
        return view('admin.tasks.index', [
            'members' => $members,
            'tasks' => $tasks
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //'budget' => 'required|string'
        ]);
        
        $project = Project::find($request->project_id);
        if ($project == null) {
            return back()->with('error', 'Specific Project not found.');
        }

        try 
        {
            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                //'budget' => $request->budget,
                'project_id' => $project->id,
                'start' => $request->start,
                'end' => $request->end,
                'status_id' => config('pending'),
                'department_id' => $request->department_id,
                'preceedby' => $request->preceedby,
                'succeedby' => $request->succeedby,
            ]);

            $data = array();
            $data['body'] = auth()->user()->name." created a Task : ".$request->name.", running from ".$request->start." to ".$request->end." on Project : ".$task->project->id." [".$task->project->name."]";
            $data['project_id'] = $project->id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['tag'] = 'task created';
            $data['emails'] = null; 
            $this->CreateNotification($data);

            activity()
            ->performedOn($task)
            ->causedBy(auth()->user())
            ->withProperties(['Task' => $task->id])
            ->log(auth()->user()->name.' Created : '.$task->name );

            return back()->with('success', 'Task created successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a Task");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $members = User::all();
        return view('admin.tasks.show', [
            'members' => $members,
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            //'description' => 'required|string|max:255',
            //'budget' => 'required|string',
            //'status' => 'required',
        ]);


        try 
        {
            $task->update([
                'name' => $request->name,
                //'description' => $request->description,
                //'budget' => $request->budget,
                'owner' => $request->owner,
                //'status_id' => $request->status,
            ]);
            //$task->save();

            $data = array();
            $data['body'] = auth()->user()->name." updated a Task ".$task->name." on Project : ".$task->project->id." [".$task->project->name."], starting ".$task->start." and ending ".$task->end;
            $data['project_id'] = $task->project->id ?? null;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;

            $this->createLog($data);

            //$data['body'] = "Be reminded on your Project Delivery: ".$project->id." [".$project->name."]";
            $data['emails'] = $this->getTeamEmails($task->id); 
            $this->CreateNotification($data);

            return back()->with('success', 'Task updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating task");
        }
    }

    public function updateStatus(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255'
            //verify captured_image
        ]);

        try 
        {
            //if project is physical
            //get gps coordinates
            //$position = Location::get();

            //match coordinates with project coordinates
            //distance($lat1, $lon1, $lat2, $lon2, $unit)
            //$distance_from_project_site = $this->distance($position->latitude, $position->longitude, $task->latitude, $task->latitude, "K");
            //dd($distance_from_project_site);
            if (1) {
                # code...
            }

            if ($request->status == 'completed') {
                
                // notify members that where assigned the next task
                // create project notification
                //return message specifies that task has been completed
                //save camera image
                //get gps coordinates

                $sub_tasks = SubTask::where('task_id',$task->id)
                ->whereNotIn('status_id', [ config('completed'), config('inactive') ])->get();

                if (!$sub_tasks->isEmpty()) { 
                    return back()->with('error', "Oops, You cannot update this Task status due to pending sub tasks");
                }
            }

            if ($request->status == 'queried') {
                // notify members that where assigned the current task
                // create project notification
                //return message specifies that task has been queried
                //save camera image
                //get gps coordinates
            }

            if ($request->status == 'in_progress') {
                // notify members that where assigned the current task has started
                // create project notification
                //return message specifies that task is in progress
                //save camera image
                //get gps coordinates
            }

            //notify project manager
            $task->update([
                'status_id' => $request->status,
                //'latitude' => $position->latitude,
                //'longitude' => $position->longitude,
            ]);
            $task->save();

            $data = array();
            $data['body'] = auth()->user()->name." Updated status of a Task ".$task->name." on Project : ".$task->project->id." [".$task->project->name."], starting ".$task->start." and ending ".$task->end;
            $data['project_id'] = $task->project->id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = NULL;
            $data['great_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['emails'] = $this->getTeamEmails($task->id); 
            $this->CreateNotification($data);

            return back()->with('success', 'Task Status updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating Task Status");
        }
    }

    public function updateCost(Request $request, Task $task)
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

    public function updateTime(Request $request, Task $task)
    {
        $validated = $request->validate([
            'start' => 'required|string|max:255',
            'end' => 'required|string|max:255',
        ]);

        try 
        {
            $task->update([
                'start' => $request->start,
                'end' => $request->end,
            ]);
            $task->save();

            return back()->with('success', 'Task time updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task time");
        }
    }

    // public function createSubTask(Request $request, Task $task)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string|max:255',
    //         'budget' => 'required|string',
    //     ]);
        
    //     try 
    //     {
    //         Task::create([
    //             'name' => $request->name,
    //             'description' => $request->description,
    //             'budget' => $request->budget,
    //             'project_id' => $request->project_id,
    //             'parent' => $task->id,
    //             'status_id' => config('pending'),
    //             'preceedby' => ($request->preceedby == null) ? null : $request->preceedby,
    //             'succeedby' => ($request->succeedby == null) ? null : $request->succeedby,
    //         ]);

    //         return back()->with('success', 'Task created successfully.');
    //     }
    //     catch (\Exception $e) 
    //     {
    //         return back()->with('error', "Oops, Error Creating a Task");
    //     }        
    // }

    public function engageTask(Request $request, Task $task)
    {
        try 
        {
            $task->update([
                'executor_id' => $request->executor
            ]);
            $task->save();
            $user = User::find($request->executor);

            $data = array();
            $data['body'] = auth()->user()->name." started Task : ".$task->name.", on Project : ".$task->project->id." [".$task->project->name."] starting ".$task->start." and ending ".$task->end;
            $data['project_id'] = $task->id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['emails'] = $this->getIndividualEmails($user->id);
            $data['tag'] = 'task start';

            $this->CreateNotification($data);

            return back()->with('success', 'Task Position Updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task");
        }
    }

    public function addMember(Request $request, Task $task)
    {
        try 
        {
            $user = User::find($request->member);
            $task = Task::find($request->task_id);
            
            if (TaskMember::where('task_id', $task->id)->where('user_id', $user->id)->exists()) {
                return back()->with('error', "Oops, That Staff is already on that team");
            }else{
                TaskMember::create([
                    'task_id' => $task->id,
                    'user_id' => $user->id
                ]);
            }
            
            
            $data = array();
            $data['body'] = auth()->user()->name." added ".$user->name." to Task : ".$task->name." on Project : ".$task->project->id." [".$task->project->name."], starting ".$task->start." and ending ".$task->end;
            $data['project_id'] = $task->project->id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['tag'] = 'added task member';

            $data['button'] = true;
            $data['action'] = 'declinelink';

            $data['emails'] = $this->getIndividualEmails($user->id); 

            $this->CreateNotification($data);

            return back()->with('success', 'Team Member added successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Adding member to Task");
        }
    }

    public function acceptDecline($user_id, $task_id)
    {
        try 
        {
            $member = TaskMember::where('task_id',$task->id)->where('user_id',$request->member)->first();
            $existing = TaskMember::where('task_id',$task->id)->where('user_id',$request->member)->first();


            if ($existing == NULL) {
                TaskMember::create([
                    'task_id' => $task->id,
                    'user_id' => $request->member
                ]);
                
            }else{
                return back()->with('error', "Oops, That Staff is already on that team");
            }
            
            $user = User::find($request->member);
            
            $data = array();
            $data['body'] = auth()->user()->name." added ".$user->name." to Task : ".$task->name." on Project : ".$task->project->id." [".$task->project->name."], starting ".$task->start." and ending ".$task->end;
            $data['project_id'] = $task->project->id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['tag'] = 'added task member';

            $data['buttonaccept'] = 'approve';
            $data['buttondecline'] = 'approve';

            $data['emails'] = $this->getIndividualEmails($user->id); 

            $this->CreateNotification($data);

            return back()->with('success', 'Team Member added successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Adding member to Task");
        }
    }

    public function removeMember(Request $request, Task $task)
    {
        try 
        {
            $existing = TaskMember::where('task_id',$task->id)->where('user_id',$request->member)->first();
            $existing->delete();
            
            $user = User::find($request->member);
            
            $data = array();
            $data['body'] = auth()->user()->name." removed ".$user->name." from Task : ".$task->name." on Project : ".$task->project->id." [".$task->project->name."]";
            $data['project_id'] = $task->project->id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $data['emails'] = null; 
            
            $this->createLog($data);
            $data['tag'] = 'removed task member';
            $this->CreateNotification($data);

            return back()->with('success', 'Team Member removed successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task");
        }
    }

    public function comment(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:255'
        ]);
        
        try 
        {
            $comment = Comment::create([
                'body' => $request->comment,
                'project_id' => $request->project_id,
                'task_id' => $request->task_id,
                'creator_id' => auth()->user()->id
            ]);

            $data = array();
            $data['body'] = auth()->user()->name." commented on ".$comment->task->name." on Project : ".$comment->project->id." [".$comment->project->name."]";
            $data['project_id'] = $comment->project_id;
            $data['task_id'] = $comment->task_id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $data['emails'] = $this->getTeamEmails($comment->task_id); 

            $this->createLog($data);
            
            $data['tag'] = 'task comment';
            $this->CreateNotification($data);

            return back()->with('success', 'Comment added successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error adding Comment");
        }
    }

    public function deleteComment(Request $request)
    {
        $comment = Comment::find($request->comment);
        $task = $comment->task;
        try 
        {
            $comment->delete();

            $data = array();
            $data['body'] = auth()->user()->name." deleted a comment from ".$task->name;
            $data['project_id'] = $task->project_id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $data['emails'] = null; 
            $this->createLog($data);

            return back()->with('success', 'Comment deleted successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error deleting Comment");
        }
    }

    public function uploadResource(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required|mimes:csv,txt,xlx,xls,xlsx,pdf,jpg,png,docx,doc|max:2048'
        ]);

        try 
        {
            if ($request->file('file')->isValid()) 
            {   
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $fileextension = $file->getClientOriginalExtension();
                $fileurl = $request->file->storeAs('uploads', time().'.'.$file->getClientOriginalExtension());

                Resource::create([
                    'name' => $request->name,
                    'url' => $fileurl,
                    //'url' => 'uploads/'.$filename,
                    'type' => $fileextension,
                    'description' => $request->description,
                    'user_id' =>  auth()->user()->id,
                    'project_id' => $task->project_id,
                    'task_id' => $task->id,
                ]);
            }
            
            $data = array();
            $data['body'] = auth()->user()->name." uploaded a resource ".$request->name.", Details: ".$fileextension;
            $data['project_id'] = $task->project_id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $data['emails'] = $this->getTeamEmails($task->id);

            $this->createLog($data);
            
            $data['tag'] = 'upload task resource';
            $this->CreateNotification($data);
            
            return back()->with('success', 'Resource added successfully.');
        }
        catch (\Exception $e) 
        {   
            //dd($e);
            return back()->with('error', "Oops, Error adding resource to Task");
        }
    }

    public function download($id)
    {
        try
        {
            if (!auth()->check()) { return abort(404); }
            $resource = Resource::where('id', $id)->firstOrFail();
            return response()->download(storage_path('app/'.$resource->url));
        }
        catch (\Exception $e) 
        {   
            return back()->with('error', "Oops, Unable to download resource, check connection");
        }
    }
 
    public function uploadDetails(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png,docx,doc|max:2048'
        ]);

        try 
        {
            if ($request->file('file')->isValid()) 
            {   
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $fileextension = $file->getClientOriginalExtension();
                $fileurl = $request->file->storeAs('uploads', time().'.'.$file->getClientOriginalExtension());

                //create task using file contents

                // Resource::create([
                //     'name' => $request->name,
                //     'url' => $fileurl,
                //     //'url' => 'uploads/'.$filename,
                //     'type' => $fileextension,
                //     'description' => $request->description,
                //     'user_id' =>  auth()->user()->id,
                //     'project_id' => $task->project_id,
                //     'task_id' => $task->id,
                // ]);
            }
            
            $data = array();
            $data['body'] = auth()->user()->name." uploaded a resource ".$request->name.", Details: ".$fileextension;
            $data['project_id'] = $task->project_id;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $data['emails'] = $this->getTeamEmails($task->id); 

            $this->createLog($data);

            $data['tag'] = 'upload task resource';
            $this->CreateNotification($data);
            
            return back()->with('success', 'Task added successfully.');
        }
        catch (\Exception $e) 
        {   
            //dd($e);
            return back()->with('error', "Oops, Error adding Task");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function disableTask(Request $request, Task $task)
    {
        try 
        {
            $task = Task::find($request->task_id);
            $task->update([
                'status_id' => config('inactive'),
            ]);
            $task->save();

            $data = array();
            $data['body'] = auth()->user()->name." Disabled a Task ".$task->name." on Project : ".$task->project->id." [".$task->project->name."]";
            $data['project_id'] = NULL;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = NULL;
            $data['great_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            $data['emails'] = $this->getTeamEmails($task->id); 
            $this->CreateNotification($data);

            return back()->with('success', 'Task disabled successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error disabling Task");
        }
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) 
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
      
        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    public function sendReminderMember(Request $request)
    {
        try 
        {
            //$member = ProjectMember::find($request->member);
            $task = Task::find($request->id);
            //$user = User::find($member->user_id);
            
            $data = array();
            $data['body'] = auth()->user()->name." sent a reminder to team members on Task : ".$task->id." [".$task->name."], starting ".$task->start." and ending ".$task->end;
            $data['project_id'] = NULL;
            $data['task_id'] = $task->id;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;

            $this->createLog($data);

            $data['body'] = "Be reminded on your Task : ".$task->id." [".$task->name."]";
            $data['emails'] = $this->getTeamEmails($task->id);
            $this->CreateNotification($data);
            
            return back()->with('success', 'Reminder sent successfully to Task Members.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Sending reminder to Task Members");
        }
    }

    public function getTeamEmails($task_id)
    {
        try 
        {
            $emails = Array();
            $members = TaskMember::where('task_id', $task_id)->get();
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
