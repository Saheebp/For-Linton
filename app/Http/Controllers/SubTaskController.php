<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use Illuminate\Http\Request;

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
            'budget' => 'required|string',
        ]);
        
        try 
        {
            $subtask = SubTask::create([
                'name' => $request->name,
                'description' => $request->description,
                'budget' => $request->budget,
                'task_id' => $request->task_id,
                'status_id' => $this->pending,
                'preceedby' => ($request->preceedby == null) ? null : $request->preceedby,
                'succeedby' => ($request->succeedby == null) ? null : $request->succeedby,
            ]);
            
            activity()
            ->performedOn($subtask)
            ->causedBy(auth()->user())
            ->withProperties(['Sub Task' => $subtask->id])
            ->log(auth()->user()->name.' Created : '.$subtask->name );

            return back()->with('success', 'Sub Task created successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Creating a Sub Task");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTask $subTask)
    {
        //
    }
}
