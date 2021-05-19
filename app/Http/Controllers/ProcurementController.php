<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = QuoteRequest::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.procurements.index', [
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
        return view('admin.procurements.create', []);
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
            QuoteRequest::create([
                'title' => $request->name,
                'subject' => $request->subject,
                'description' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'department' => $request->department,
                'creator_id' => auth()->user()->id,
                'department_id' => $request->department,
                'status_id' => $this->pending
            ]);

            return back()->with('success', 'Request created successfully.');
        }
        catch (\Exception $e) 
        {
            dd($e);
            return back()->with('error', "Oops, Error Creating Request");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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