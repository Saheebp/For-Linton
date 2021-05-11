<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

use Auth;

class ItemController extends Controller
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
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'available_quantity' => 'required|numeric',
            'threshold_quantity' => 'required|numeric',
            'batch_number' => 'required|numeric', 
            'status' => 'required',
            'category' => 'required|not_in:--Select Category--',
            'status' => 'required|not_in:--Select Status--'
        ]);

        try
        {
            Item::create([
                'name' => $request->name,
                'available_quantity' => $request->available_quantity, 
                'threshold_quantity' => $request->threshold_quantity,
                'created_by' => Auth::user()->id,
                'batch_number' => $request->batch_number,
                'status_id' => $request->status,
                'category_id' => $request->category,
                'inventory_id' => $request->inventory_id
            ]);

            return back()->with('success', 'Inventory record added successfully');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
