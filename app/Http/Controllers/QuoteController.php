<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\QuoteResource;
use Illuminate\Http\Request;

class QuoteController extends Controller
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
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png,docx,doc|max:2048',
            'cost' => 'required|string|max:255'
        ]);

        // $initialquote = Quote::where('user_id',auth()->user()->id)
        // ->where('request_fq_id',$request->request_fq_id)->first();

        // if ($initialquote != NULL) {
        //     return back()->with('error', "Oops, You have already submitted a quotation for this request.");
        // }
        
        $quote = Quote::where('id', $request->quote_id)->first();
        if ($quote == NULL) {
            return back()->with('error', "Oops, Resource not found.");
        }
        
        try 
        {
            if ($request->file('file')->isValid()) 
            {   
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $fileextension = $file->getClientOriginalExtension();
                $fileurl = $request->file->storeAs('quotes', time().'.'.$file->getClientOriginalExtension());

                $quote->update([
                    'status_id' => $this->completed,
                    'total_cost' => $request->cost
                ]);
                $quote->save();

                QuoteResource::create([
                    'url' => $fileurl,
                    'name' => $filename,
                    'type' => $fileextension,
                    'description' => 'Attachment for Quotation',
                    'quote_id' => $quote->id
                ]);
            }
            return back()->with('success', 'Quotation added successfully.');
        }
        catch (\Exception $e) 
        {   
            //dd($e);
            return back()->with('error', "Oops, Error adding resource to Request");
        }
    }

    public function updateStatus(Request $request, Quote $quote)
    {
        $validated = $request->validate([
            'approval' => 'required|string|max:255'
        ]);
        
        $quote = Quote::find($request->quote_id);

        if ($quote == null) {
            return back()->with('error', "Oops, You cannot update this Quote status");
        }

        try 
        {
            $quote->update([
                'approval_status' => $request->approval,
            ]);
            $quote->save();

            return back()->with('success', 'Quote Status updated successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Updating Quote Status");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }

    public function download($id)
    {
        try
        {
            if (!auth()->check()) { return abort(404); }
            $resource = QuoteResource::where('id', $id)->firstOrFail();
            return response()->download(storage_path('app/'.$resource->url));
        }
        catch (\Exception $e) 
        {   
            return back()->with('error', "Oops, Unable to download resource, check connection");
        }
    }
}
