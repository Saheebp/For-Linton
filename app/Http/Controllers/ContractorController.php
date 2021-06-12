<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Designation;
use App\Models\Quote;
use App\Models\RequestFq;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Spatie\Activitylog\Models\Activity;

use Auth;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contractors = User::where('is_contractor','true')->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.contractors.index', [
            'contractors' => $contractors
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contractor = User::where('is_admin','false')->where('is_contractor','true')->where('id', $id)->first();
        $logs = Activity::where('causer_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        $roles = Role::all();
        $quotes = Quote::where('user_id', $id)->get();
        $requests = RequestFq::where('user_id', $id)->get();
        
        return view('admin.contractors.show', 
        [
            'contractor' => $contractor,
            'logs' => $logs,
            'roles' => $roles,
            'quotes' => $quotes,
            'requests' => $requests
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    // public function addContractor(Request $request)
    // {
    //     try 
    //     {
    //         TeamMember::create([
    //             'project_id' => $task->project_id,
    //             'task_id' => $task->id,
    //             'user_id' => $request->member
    //         ]);
            
    //         $user = User::find($request->member);

    //         $data = array();
    //         $data['body'] = auth()->user()->name." added ".$user->name." to Task : ".$task->name;
    //         $data['project_id'] = $task->project->id;
    //         $data['task_id'] = $task->id;
    //         $data['sub_task_id'] = NULL;
    //         $data['user_id'] = auth()->user()->id;
    //         $this->createLog($data);

    //         return back()->with('success', 'Team Member added successfully.');
    //     }
    //     catch (\Exception $e) 
    //     {
    //         return back()->with('error', "Oops, Error Updating Task");
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
