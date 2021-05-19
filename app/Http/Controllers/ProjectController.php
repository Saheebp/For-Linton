<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Resource;
use App\Models\Status;
use App\Models\State;
use App\Models\Designation;

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
        $managers = User::role('Manager')->get();
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        $states = State::all();

        return view('admin.projects.index', [
            'managers' => $managers,
            'projects' => $projects,
            'states' => $states
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
            'manager' => 'required|string',

            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'objective' => 'required|string|max:255',
    
            'start' => 'required|string|max:255',
            'end' => 'required|string|max:255',
            
            'nature' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'funding_source' => 'required|string|max:255',
            'budget' => 'required|string|max:255',
    
            'sponsor_name' => 'required|string|max:255',
            'sponsor_email' => 'required|string|max:255',
            'sponsor_phone' => 'required|string|max:255',
    
            'state' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        try 
        {
            $project = Project::create([

                'name' => $request->name,
                'description' => $request->description,
                'objective' => $request->objective,
                'start' => $request->start,
                'end' => $request->end,
                
                'nature' => $request->nature,
                'type' => $request->type,
                'funding_source' => $request->funding_source,
                'budget' => $request->budget,

                'sponsor_name' => $request->sponsor_name,
                'sponsor_email' => $request->sponsor_email,
                'sponsor_phone' => $request->sponsor_phone,

                'state' => $request->state,
                'lga' => $request->lga,
                'address' => $request->address,
                
                'manager_id' => $request->manager,
                'creator_id' => auth()->user()->id,
                'status_id' => $this->new
            ]);

            Inventory::create([
                'name' => $request->name,
                'description' => $request->description,
                'project_id' => $project->id,
                'status_id' => $this->new,
            ]);

            return back()->with('success', 'Project and Inventory created successfully.');
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
        $members = User::all();
        $projects = Project::all();
        $statuses = Status::all();
        $categories = Category::all();
        $designations = Designation::all();

        return view('admin.projects.show', [
            'members' => $members,
            'project' => $project,
            'projects' => $projects,
            'statuses' => $statuses,
            'categories' => $categories,
            'designations' => $designations
        ]);
    }

    public function uploadResource(Request $request, Project $project)
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
                'project_id' => $project->id
            ]);
            
            return back()->with('success', 'Resource added successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error adding resource to Project");
        }
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
