<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ProcRequest;
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
        return view('admin.proc_requests.show', [
            'request' => $request
        ]);
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