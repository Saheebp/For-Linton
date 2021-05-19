<?php

namespace App\Http\Controllers;

use App\Models\InventoryItems;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

use Auth;

class InventoryItemsController extends Controller
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
            'warehouse_item' => 'required|string|max:255',
            'inventory' => 'required|numeric',
            'quantity' => 'required|numeric',
            'batch' => 'required|numeric', 
        ]);
        
        $warehouse_item = WarehouseItem::find($request->warehouse_item);
        if ($warehouse_item != NULL && $warehouse_item->quantity > $request->quantity) 
        {


        }
        else
        {
            
        }

        try
        {
            $item = InventoryItem::create([
                'name' => $request->name,
                'quantity' => $request->available_quantity, 
                'threshold' => $request->threshold_quantity,
                'created_by' => Auth::user()->id,
                'batch_id' => $request->batch,
                'image' => $request->image,
                'status_id' => $this->available,
                'category_id' => $request->category_id,
                'inventory_id' => $request->inventory_id
            ]);
            
            activity()
            ->performedOn($item)
            ->causedBy(auth()->user())
            ->withProperties(['Item' => $item->id])
            ->log(auth()->user()->name.' Created new Item : '.$item->name );


            return back()->with('success', 'Warehouse record added successfully');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryItems $inventoryItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryItems $inventoryItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryItems $inventoryItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryItems $inventoryItems)
    {
        //
    }
}