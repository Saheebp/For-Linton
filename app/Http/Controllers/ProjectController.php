<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.projects.index', [
            'projects' => $projects
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
            'owner' => 'required|string',
        ]);

        try 
        {
            Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'budget' => $request->budget,
                'owner' => $request->owner,
                'status_id' => $this->pending,
            ]);

            return back()->with('success', 'Project created successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a Project");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'budget' => 'required|string',
            'status' => 'required',
        ]);

        try 
        {
            $project->update([
                'name' => $request->name,
                'description' => $request->description,
                'budget' => $request->budget,
                'owner' => $request->owner,
                'status_id' => $request->status,
            ]);
            $project->save();

            return back()->with('success', 'Project created successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a Project");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
