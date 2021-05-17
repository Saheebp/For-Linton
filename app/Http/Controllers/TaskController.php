<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TeamMember;
use App\Models\Resource;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = TeamMember::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
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
            'budget' => 'required|string',
        ]);
        
        try 
        {
            Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'budget' => $request->budget,
                'project_id' => $request->project_id,
                'duedate' => $request->duedate,
                'status_id' => $this->new,
                'preceedby' => $request->preceedby,
                'succeedby' => $request->succeedby,
            ]);

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
            'description' => 'required|string|max:255',
            'budget' => 'required|string',
            'status' => 'required',
        ]);

        try 
        {
            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'budget' => $request->budget,
                'owner' => $request->owner,
                'status_id' => $request->status,
            ]);
            $task->save();

            return back()->with('success', 'Task updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating a Project");
        }
    }

    public function updateStatus(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255'
        ]);

        try 
        {
            $task->update([
                'status_id' => $request->status,
            ]);
            $task->save();

            return back()->with('success', 'Task Status updated successfully.');
        }
        catch (\Exception $e) 
        {
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
    //             'status_id' => $this->pending,
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
            TeamMember::create([
                'project_id' => $task->project_id,
                'task_id' => $task->id,
                'user_id' => $request->member
            ]);

            return back()->with('success', 'Team Member added successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task");
        }
    }

    public function removeMember(Request $request)
    {
        try 
        {
            $member = TeamMember::find($request->id);
            $member->delete();

            return back()->with('success', 'Team Member deleted successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error deleting Member");
        }
    }

    public function uploadResource(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png,docx|max:2048'
        ]);

        try 
        {
            $file = $request->file('file');
            //File Name
            $filename = $file->getClientOriginalName();
            //File Extension
            $fileextension = $file->getClientOriginalExtension();
            //File Real Path
            $filepath = $file->getRealPath();
            //File Size
            $filesize = $file->getSize();
            //File Mime Type
            $filetype = $file->getMimeType();
            //Move Uploaded File
            $destinationPath = 'uploads';
            $url = $file->move($destinationPath, $file->getClientOriginalName());
            
            Resource::create([
                'name' => $request->name,
                'url' => 'uploads/'.$filename,
                'type' => $filetype,
                'description' => $request->description,
                'creator' =>  auth()->user()->id,
                'project_id' => $task->project_id,
                'task_id' => $task->id,
            ]);
            
            return back()->with('success', 'Resource added successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error adding resource to Task");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
