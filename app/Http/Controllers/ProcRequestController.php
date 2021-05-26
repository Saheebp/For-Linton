<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ProcRequest;
use App\Models\ProcContractor;
use App\Models\ProcFile;
use App\Models\User;
use Illuminate\Http\Request;

class ProcRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = ProcRequest::orderBy('created_at', 'desc')->paginate(10);
        $departments = Department::all();

        return view('admin.proc_requests.index', [
            'departments' => $departments,
            'requests' => $requests
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
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start' => 'required|string|max:255',
            'end' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        
        try 
        {
            $request = ProcRequest::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'description' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'creator_id' => auth()->user()->id,
                'department_id' => $request->department,
                'status_id' => $this->pending
            ]);
            
            return redirect()->route('requests.index')->with('success', 'Quote Request created successfully');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating Request");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcRequest  $procRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ProcRequest $request)
    {
        //
        $contractors = User::where('is_admin','false')->where('is_contractor','true')->get();
        
        return view('admin.proc_requests.show', [
            'contractors' => $contractors,
            'request' => $request
        ]);
    }

    public function addContractor(Request $request)
    {
        try 
        {
            $procContractor = ProcContractor::create([
                'proc_request_id' => $request->proc_request_id,
                'contractor_id' => $request->contractor_id
            ]);
            
            return back()->with('success', 'Contractor added successfully.');
        }
        catch (\Exception $e) 
        {
            
            return back()->with('error', "Oops, Error adding Contractor");
        }
    }

    public function uploadResource(Request $request)
    {
        $validated = $request->validate([
            //'name' => 'required|string|max:255',
            //'description' => 'required|string|max:255',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png,docx|max:2048'
        ]);

        $existing = ProcFile::where('creator_id',auth()->user()->id)
        ->where('proc_request_id',$request->proc_request_id)->first();

        if ($existing != NULL) {
            return back()->with('error', "Oops, You have already submitted a quotation for this request.");
        }

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
            
            ProcFile::create([
                //'name' => $request->name,
                'url' => 'uploads/'.$filename,
                'type' => $fileextension,
                //'description' => $request->description,
                'creator_id' =>  auth()->user()->id,
                'proc_request_id' => $request->proc_request_id,
                //'proc_quote_id' => $request->proc_quote_id
            ]);
            
            // $data = array();
            // $data['body'] = auth()->user()->name." uploaded a resource ".$request->name.", Details: ".$fileextension."|".$filesize;
            // $data['project_id'] = $task->project_id;
            // $data['task_id'] = $task->id;
            // $data['sub_task_id'] = NULL;
            // $data['user_id'] = auth()->user()->id;
            // $this->createLog($data);
            
            return back()->with('success', 'Resource added successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error adding resource to Request");
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcRequest  $procRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcRequest $procRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcRequest  $procRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcRequest $procRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcRequest  $procRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcRequest $procRequest)
    {
        //
    }
}
