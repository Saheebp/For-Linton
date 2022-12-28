<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Quote;
use App\Models\RequestFq;
use App\Models\RequestFqResource;

use App\Models\User;
use Illuminate\Http\Request;

class RequestFqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestFq::orderBy('created_at', 'desc')->paginate(10);
        $departments = Department::all();

        return view('admin.requests.index', [
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
            'cost' => 'required|string|max:255',
        ]);
        
        try 
        {
            $request = RequestFq::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'description' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'user_id' => auth()->user()->id,
                'department_id' => $request->department,
                'status_id' => config('pending'), 
                'total_cost' => $request->cost
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
     * @param  \App\Models\RequestFq  $requestFq
     * @return \Illuminate\Http\Response
     */
    public function show(RequestFq $request)
    {
        //
        $contractors = User::where('is_admin','false')->where('is_contractor','true')->get();
        
        return view('admin.requests.show', [
            'contractors' => $contractors,
            'request' => $request
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestFq  $requestFq
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestFq $requestFq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestFq  $requestFq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestFq $requestFq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestFq  $requestFq
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestFq $requestFq)
    {
        //
    }

    public function addContractor(Request $request)
    {
        try 
        {
            $existing = Quote::where('request_fq_id',$request->request_fq_id)
            ->where('user_id',$request->contractor_id)->first();
            
            if ($existing == NULL) 
            {
                $quote = Quote::create([
                    'request_fq_id' => $request->request_fq_id,
                    'user_id' => $request->contractor_id,
                    'status_id' => config('pending')
                ]);
                
            }else{
                return back()->with('error', "Oops, That Contractor is already on the Request");
            }

            return back()->with('success', 'Contractor added successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error adding Contractor");
        }
    }

    public function uploadResource(Request $request)
    {  
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,doc|max:2048'
        ]);

        
        try 
        {
            if ($request->file('file')->isValid()) 
            {   
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $fileextension = $file->getClientOriginalExtension();
                $fileurl = $request->file->storeAs('uploads', time().'.'.$file->getClientOriginalExtension());

                RequestFqResource::create([
                    'name' => $request->name,
                    'url' => $fileurl,
                    'type' => $fileextension,
                    'description' => $request->description,
                    'user_id' =>  auth()->user()->id,
                    'request_fq_id' => $request->request_fq_id,
                ]);
            }
            
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
            //dd($e);
            return back()->with('error', "Oops, Error adding resource to Request");
        }
    }
    
    public function download($id)
    {
        try
        {
            if (!auth()->check()) { return abort(404); }
            $resource = RequestFqResource::where('id', $id)->firstOrFail();
            return response()->download(storage_path('app/'.$resource->url));
        }
        catch (\Exception $e) 
        {   
            return back()->with('error', "Oops, Unable to download resource, check connection");
        }
    }
}
