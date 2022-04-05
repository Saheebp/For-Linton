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
    public function update(Request $request, GreatTask $greatTask)
    {
        //
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
}
