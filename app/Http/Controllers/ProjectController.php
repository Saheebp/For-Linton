<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Comment;
use App\Models\Resource;
use App\Models\Status;
use App\Models\State;
use App\Models\Designation;
use App\Models\ProjectMember;

//traits
use App\Traits\AppStatus;

use Stevebauman\Location\Facades\Location;
use Geocoder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    use AppStatus;

    public $new;
    public $pending;

    public function __construct()
    {
        //$this->middleware('auth')->except(['index', 'select', 'createSharedTrip', 'createHiredTrip', 'confirm']);
        //$this->middleware('permission:member dashboard', ['only' => ['dashboard']]);

        $this->paid = $this->returnStatusId("New");
        $this->pending = $this->returnStatusId("Pending");
    }
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
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = User::role('Level 4')->get();
        $states = State::all();

        return view('admin.projects.create', [
            'managers' => $managers,
            'states' => $states
        ]);
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
            
            //'nature' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            //'funding_source' => 'required|string|max:255',
            // 'budget' => 'required|string|max:255',
    
            // 'sponsor_name' => 'required|string|max:255',
            // 'sponsor_email' => 'required|string|max:255',
            // 'sponsor_phone' => 'required|string|max:255',
    
            'state' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        
        try 
        {
            //get gps coordinates
            $position = Location::get();

            // or resolve address into coordinates
            // $client = new \GuzzleHttp\Client();
            // $geocoder = new \Spatie\Geocoder\Geocoder($client);
            // $geocoder->setApiKey(config('geocoder.key'));
            // $geocoder->setCountry(config('geocoder.country'));
            // $address = $geocoder->getCoordinatesForAddress($request->address);
            
            $project = Project::create([

                'name' => $request->name,
                'description' => $request->description,
                'objective' => $request->objective,
                'start' => $request->start,
                'end' => $request->end,
                
                'latitude' => $position->latitude,
                'longitude' => $position->longitude,
                
                //'nature' => $request->nature,
                'type' => $request->type,
                //'funding_source' => $request->funding_source,
                //'budget' => $request->budget,

                // 'sponsor_name' => $request->sponsor_name,
                // 'sponsor_email' => $request->sponsor_email,
                // 'sponsor_phone' => $request->sponsor_phone,

                'state' => $request->state,
                'lga' => $request->lga,
                'address' => $request->address,
                
                'manager_id' => $request->manager,
                'creator_id' => auth()->user()->id,
                'status_id' => $this->pending
            ]);

            $architectural_design = null;
            $structural_design = null;
            $boquantities = null;
            $powork = null;
            $rpdocuments = null;

            if ($request->file('architectural_design')->isValid()) 
            {   
                $file = $request->file('architectural_design');
                $architectural_design = $this->projectfileUpload($file, $project->id, 'Architectural Design', 'Document containing Architectural Design');
            }

            if ($request->file('structural_design')->isValid()) 
            {   
                $file = $request->file('structural_design');
                $structural_design = $this->projectfileUpload($file, $project->id, 'Structural Design', 'Document containing Structural Design');
            }

            if ($request->file('boquantities')->isValid()) 
            {   
                $file = $request->file('boquantities');
                $boquantities = $this->projectfileUpload($file, $project->id, 'Bill of Quantitites', 'Document containing Bill of Quantitites');
            }

            if ($request->file('powork')->isValid()) 
            {   
                $file = $request->file('powork');
                $powork = $this->projectfileUpload($file, $project->id, 'Progress of Work', 'Document containing Progress of Work');
            }

            if ($request->file('rpdocuments')->isValid()) 
            {   
                $file = $request->file('rpdocuments');
                $rpdocuments = $this->projectfileUpload($file, $project->id, 'Related Project Documents', 'Document containing Related Project Documents');
            }

            Inventory::create([
                'name' => $request->name,
                'description' => $request->description,
                'project_id' => $project->id,
                'status_id' => $this->new,
            ]);

            $project->update([
                'architectural_design' => $architectural_design,
                'structural_design' => $structural_design,
                'boquantities' => $boquantities,
                'powork' => $powork,
                'rpdocuments' => $rpdocuments
            ]);
            $project->save();
            
            $data = array();
            $data['body'] = auth()->user()->name." created a Project ".$request->name.", Details: ".$request->state."|".$request->lga."| starting: ".$request->start." and ending: ".$request->end;
            $data['project_id'] = $project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return redirect()->route('projects.index')->with('success', 'Project and Inventory created successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Creating a Project");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function show(Project $project)
    // {
    //     try 
    //     {
    //         $staff = User::all();
    //         $statuses = Status::all();
    //         $categories = Category::all();
    //         $designations = Designation::all();

    //         $members = ProjectMember::where('project_id',$project->id)->get();
            
    //         $totalweeks = round(( strtotime($project->end) - strtotime($project->start)) / 3600 / 24 / 7);
    //         $tasks = $project->tasks;

    //         $flots = array();
    //         $i = 0;
    //         foreach($tasks as $task)
    //         {
    //             $length = round(( strtotime($task->end) - strtotime($task->start)) / 3600 / 24 / 7);
    //             $preoffset = round(( strtotime($task->start) - strtotime($project->start)) / 3600 / 24 / 7);
    //             $postoffset = round(( strtotime($project->end) - strtotime($task->end)) / 3600 / 24 / 7);
                
    //             $flots[$i] = array();
    //             $flots[$i]['name'] = $task->name;
    //             $flots[$i]['preoffset'] = $preoffset;
    //             $flots[$i]['length'] = $length;
    //             $flots[$i]['postoffset'] = $postoffset;
    //             $flots[$i]['status_style'] = $task->status->style;

    //             $i = $i+1;
    //         }

    //         $completion = $this->completion($project->id);

    //         return view('admin.projects.show', [
    //             'staff' => $staff,
    //             'members' => $members,
    //             'project' => $project,
    //             //'projects' => $projects,
    //             'statuses' => $statuses,
    //             'categories' => $categories,
    //             'designations' => $designations,
    //             'completion' => $completion,
    //             'totalweeks' => $totalweeks,
    //             'flots' => $flots
    //         ]);
    //     }
    //     catch (\Exception $e) 
    //     {
    //         return back()->with('error', "Oops, Cannot access project at the moment");
    //     }
    // }

    public function team(Project $project)
    {
        try 
        {
            $staff = User::all();
            $designations = Designation::all();
            return view('admin.projects.team', [
                'staff' => $staff,
                'project' => $project,
                'designations' => $designations,
                'tabtea' => 'active' 
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function tasks(Project $project)
    {
        try 
        {
            $designations = Designation::all();
            return view('admin.projects.tasks', [
                'project' => $project,
                'designations' => $designations,
                'tabtas' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function activity(Project $project)
    {
        try 
        {
            return view('admin.projects.activity', [
                'project' => $project,
                'tabact' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function timeline(Project $project)
    {
        try 
        {
            $flots = array();
            $i = 0;
            foreach($project->tasks as $task)
            {
                $length = round(( strtotime($task->end) - strtotime($task->start)) / 3600 / 24 / 7);
                $preoffset = round(( strtotime($task->start) - strtotime($project->start)) / 3600 / 24 / 7);
                $postoffset = round(( strtotime($project->end) - strtotime($task->end)) / 3600 / 24 / 7);
                
                $flots[$i] = array();
                $flots[$i]['name'] = $task->name;
                $flots[$i]['preoffset'] = $preoffset;
                $flots[$i]['length'] = $length;
                $flots[$i]['postoffset'] = $postoffset;
                $flots[$i]['status_style'] = $task->status->style;

                $i = $i+1;
            }

            return view('admin.projects.timeline', [
                'project' => $project,
                'flots' => $flots,
                'tabtim' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function resources(Project $project)
    {
        try 
        {
            return view('admin.projects.resources', [
                'project' => $project,
                'tabres' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function budget(Project $project)
    {
        try 
        {
            return view('admin.projects.budget', [
                'project' => $project,
                'tabbud' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function inventory(Project $project)
    {
        try 
        {
            return view('admin.projects.inventory', [
                'project' => $project,
                'tabinv' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function comments(Project $project)
    {
        try 
        {
            return view('admin.projects.comments', [
                'project' => $project,
                'tabcom' => 'active'
            ]);
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Cannot access project at the moment");
        }
    }

    public function uploadResource(Request $request, Project $project)
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

                Resource::create([
                    'name' => $request->name,
                    'url' => $fileurl,
                    'type' => $fileextension,
                    'description' => $request->description,
                    'user_id' =>  auth()->user()->id,
                    'project_id' => $project->id
                ]);
            }
            
            $data = array();
            $data['body'] = auth()->user()->name." uploaded a resource ".$request->name.", Details: ".$fileextension;
            $data['project_id'] = $project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return back()->with('success', 'Resource added successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error adding resource to Project");
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

    public function addMember(Request $request, Project $project)
    {
        try 
        {

            $existing = ProjectMember::where('project_id',$project->id)->where('user_id',$request->member)->first();
            if ($existing == NULL) {
                ProjectMember::create([
                    'project_id' => $project->id,
                    'user_id' => $request->member,
                    'designation_id' => $request->designation
                ]);
                
            }else{
                return back()->with('error', "Oops, That Staff is already on that team");
            }
            
            $user = User::find($request->member);

            $data = array();
            $data['body'] = auth()->user()->name." added ".$user->name." to Project : ".$project->name;
            $data['project_id'] = $project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return back()->with('success', 'Staff added to project successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error adding Staff Project");
        }
    }
    public function removeMember(Request $request)
    {
        try 
        {
            $member = ProjectMember::find($request->member);
            $project = Project::find($request->project);
            
            $user = User::find($member->user_id);
            $member->delete();
            
            $data = array();
            $data['body'] = auth()->user()->name." removed ".$user->name." from Project : ".$project->name;
            $data['project_id'] = $project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return back()->with('success', 'Team Member removed successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error removing member from Project");
        }
    }

    public function comment(Request $request)
    {
        try 
        {
            $comment = Comment::create([
                'body' => $request->comment,
                'project_id' => $request->project_id,
                'creator_id' => auth()->user()->id
            ]);

            $data = array();
            $data['body'] = auth()->user()->name." commented on the project";
            $data['project_id'] = $comment->project_id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return back()->with('success', 'Comment added successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error adding Comment");
        }
    }
    
    public function updateStatus(Request $request, Project $project)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255'
        ]);
        
        $tasks = Task::where('project_id',$request->project_id)
        ->where('status_id', '!=', $this->completed)->get();

        if ($tasks != null) {
            return back()->with('error', "Oops, You cannot update this project status due to pending tasks");
        }

        try 
        {
            $project->update([
                'status_id' => $request->status,
            ]);
            $project->save();

            return back()->with('success', 'Project Status updated successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating Project Status");
        }
    }

    public function updateRole(Request $request, ProjectMember $member)
    {
        $validated = $request->validate([
            'designation' => 'required|string|max:255'
        ]);

        try 
        {
            $designation = Designation::find($request->designation);
            $ProjectMember = ProjectMember::find($request->member);
            
            if ($ProjectMember != NULL) {
                $ProjectMember->update([
                    'designation_id' => $request->designation
                ]);
                
            }else{
                return back()->with('error', "Oops, Record not found");
            }
            
            //$user = User::find($request->member);

            $data = array();
            $data['body'] = auth()->user()->name." updated ".$ProjectMember->user->name."'s role to ".$designation->name;
            $data['project_id'] = $request->project;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return back()->with('success', 'Staff Role updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating Project Status");
        }
    }

    public function updateBudget(Request $request)
    {
        $validated = $request->validate([
            'budget' => 'required|string|max:255'
        ]);

        try 
        {
            $project = Project::find($request->project);
            
            if ($project != NULL) 
            {
                $project->update([
                    'budget' => $request->budget
                ]);
                $project->save();
                
            }else{
                return back()->with('error', "Oops, Project Budget not updated");
            }
            
            $data = array();
            $data['body'] = auth()->user()->name." updated ".$project->name."'s budget to ".$request->budget;
            $data['project_id'] = $project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            return back()->with('success', 'Budget updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating Project Budget");
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
            //'manager' => 'required|string',

            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'objective' => 'required|string|max:255',
    
            'start' => 'required|string|max:255',
            'end' => 'required|string|max:255',
            
            'nature' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            //'funding_source' => 'required|string|max:255',
            //'budget' => 'required|string|max:255',
    
            'sponsor_name' => 'required|string|max:255',
            'sponsor_email' => 'required|string|max:255',
            'sponsor_phone' => 'required|string|max:255',
    
            'state' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        try 
        {
            $project = Project::find($request->project_id);
            $project->update([

                'name' => $request->name,
                'description' => $request->description,
                'objective' => $request->objective,
                'start' => $request->start,
                'end' => $request->end,
                
                'nature' => $request->nature,
                'type' => $request->type,
                'funding_source' => $request->funding_source,
                //'budget' => $request->budget,

                'sponsor_name' => $request->sponsor_name,
                'sponsor_email' => $request->sponsor_email,
                'sponsor_phone' => $request->sponsor_phone,

                'state' => $request->state,
                'lga' => $request->lga,
                'address' => $request->address,
                
                //'manager_id' => $request->manager,
                //'creator_id' => auth()->user()->id,
                //'status_id' => $this->pending
            ]);
            $project->save();
            
            $data = array();
            $data['body'] = auth()->user()->name." updated Project ".$request->name.", Details: ".$request->state."|".$request->lga."| starting: ".$request->start." and ending: ".$request->end;
            $data['project_id'] = $project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
    

    public function completion($project_id)
    {
        $tasks = Task::where('project_id',$project_id)->get();
        $completed = $tasks->where('status_id',$this->completed)->count();
        $all_tasks = $tasks->count();
        $completion = ($completed == 0) ? 0 : ($completed/$all_tasks)*100;
        
        return $completion;
    }

    public function projectfileUpload($file, $project_id, $name, $description)
    {
        $filename = time().'.'.$file->getClientOriginalExtension();
        $fileextension = $file->getClientOriginalExtension();
        $fileurl = $file->storeAs('uploads', time().'.'.$file->getClientOriginalExtension());
        
        Resource::create([
            'name' => $name,
            'url' => $fileurl,
            'type' => $fileextension,
            'description' => $description,
            'user_id' =>  auth()->user()->id,
            'project_id' => $project_id
        ]);
        return $fileurl;
    }
}
