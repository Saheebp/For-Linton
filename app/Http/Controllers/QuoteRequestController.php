<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return view('admin.procurement.create', [
        // ]);
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
     * @param  \App\Models\QuoteRequest  $quoteRequest
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteRequest $quoteRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuoteRequest  $quoteRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(QuoteRequest $quoteRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuoteRequest  $quoteRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuoteRequest $quoteRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuoteRequest  $quoteRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuoteRequest $quoteRequest)
    {
        //
    }
}
