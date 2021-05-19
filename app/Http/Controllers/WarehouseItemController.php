<?php

namespace App\Http\Controllers;

use App\Models\WarehouseItem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

use Auth;

class WarehouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //orderBy('created_at', 'desc')->paginate(10);
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
            'quantity' => 'required|numeric',
            'threshold' => 'required|numeric',
            'batch' => 'required|numeric', 
            'category' => 'required|not_in:--Select Category--',
        ]);

        try
        {
            $warehouse = WarehouseItem::create([
                'name' => $request->name,
                'quantity' => $request->quantity, 
                'available' => $request->quantity, 
                'threshold' => $request->threshold,
                'created_by' => Auth::user()->id,
                'batch_id' => $request->batch,
                'image' => $request->image,
                'status_id' => $this->available,
                'category_id' => $request->category,
            ]);
            
            activity()
            ->performedOn($warehouse)
            ->causedBy(auth()->user())
            ->withProperties(['Ware House' => $warehouse->id])
            ->log(auth()->user()->name.' Created : '.$warehouse->name );


            return back()->with('success', 'Warehouse record added successfully');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseItems  $warehouseItems
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseItems $warehouseItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseItems  $warehouseItems
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseItems $warehouseItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseItems  $warehouseItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseItems $warehouseItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseItems  $warehouseItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseItems $warehouseItems)
    {
        //
    }
}
