<?php

namespace App\Http\Controllers;

use App\Models\ProcQuote;
use Illuminate\Http\Request;

class ProcQuoteController extends Controller
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
        $validated = $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png,docx,doc|max:2048'
        ]);

        $initialquote = ProcQuote::where('contractor_id',auth()->user()->id)
        ->where('proc_request_id',$request->proc_request_id)->first();

        if ($initialquote != NULL) {
            return back()->with('error', "Oops, You have already submitted a quotation for this request.");
        }

        try 
        {
            if ($request->file('file')->isValid()) 
            {   
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $fileextension = $file->getClientOriginalExtension();
                $fileurl = $request->file->storeAs('quotes', time().'.'.$file->getClientOriginalExtension());

                ProcQuote::create([
                    'fileurl' => $fileurl,
                    'filename' => $filename,
                    'filetype' => $fileextension,
                    
                    'contractor_id' =>  auth()->user()->id,
                    'proc_request_id' => $request->proc_request_id,
                    'status_id' => $this->completed 
                ]);
            }
            return back()->with('success', 'Quotation added successfully.');
        }
        catch (\Exception $e) 
        {   dd($e);
            return back()->with('error', "Oops, Error adding resource to Request");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcQuote  $procQuote
     * @return \Illuminate\Http\Response
     */
    public function show(ProcQuote $procQuote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcQuote  $procQuote
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcQuote $procQuote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcQuote  $procQuote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcQuote $procQuote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcQuote  $procQuote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcQuote $procQuote)
    {
        //
    }

    public function download($id)
    {
        if (!auth()->check()) { return abort(404); }
        $request = ProcQuote::where('id', $id)->firstOrFail();
        return response()->download(storage_path('app/'.$request->fileurl));
    }
}
