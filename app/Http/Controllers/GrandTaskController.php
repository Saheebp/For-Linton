<?php

namespace App\Http\Controllers;

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
}
