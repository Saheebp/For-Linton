<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
            'budget' => 'required|string',
        ]);
        
        try 
        {
            Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'budget' => $request->budget,
                'project_id' => $request->project_id,
                'status_id' => $this->pending,
                'preceedby' => ($request->preceedby == null) ? null : $request->preceedby,
                'succeedby' => ($request->succeedby == null) ? null : $request->succeedby,
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
        //
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
    public function update(Request $request, Project $task)
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

    public function createSubTask(Request $request, Task $task)
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
                'parent' => $task->id,
                'status_id' => $this->pending,
                'preceedby' => ($request->preceedby == null) ? null : $request->preceedby,
                'succeedby' => ($request->succeedby == null) ? null : $request->succeedby,
            ]);

            return back()->with('success', 'Task created successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a Task");
        }        }

    public function engageTask(Request $request, Project $task)
    {
        try 
        {
            $task->update([
                'executor' => $request->executor
            ]);
            $task->save();

            return back()->with('success', 'Task Position Updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task");
        }
    }

    public function uploadResource(Request $request, Project $task)
    {
        try 
        {
            $path = $request->file('avatar')->store('avatars');
            
            Resource::create([
                'name' => $request->name,
                'url' => $request->path,
                'type' => $request->type,
                'description' => $request->description,
                'creator' => '',

                'project_id' =>$task->project->id,
                'task_id' => $task->id,
                'status_id' => $request->status,
            ]);

            $task->update([
                'executor' => $request->executor
            ]);
            $task->save();

            return back()->with('success', 'Task Position Updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Task");
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
