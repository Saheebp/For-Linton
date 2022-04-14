<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use App\Models\InventoryItem;
use App\Models\InventoryActivity;
use App\Models\WarehouseItem;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

use Auth;

class InventoryItemController extends Controller
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
                'quantity' => $request->quantity, 
                'threshold' => $request->threshold,
                'created_by' => Auth::user()->id,
                'batch_id' => $request->batch,
                'image' => $request->image,
                'status_id' => config('available'),
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

    public function disburse(Request $request)
    {
        try
        {
            $receiver = User::find($request->member);

            $item = InventoryActivity::create([
                'type' => 'Disbursement',
                'quantity' => $request->quantity,
                'receiver_id' => $request->member,
                'user_id' => Auth::user()->id,
                'inventory_id' => $request->inventory_id,
                'inventory_item_id' => $request->inventory_item_id
            ]);

            $inventory_item = InventoryItem::find($request->inventory_item_id);
            $inventory_item->update([
                'available' => $inventory_item->available - $request->quantity
            ]);
            $inventory_item->save();
            
            activity()
            ->performedOn($item)
            ->causedBy(auth()->user())
            ->withProperties(['Item' => $item->id])
            ->log(auth()->user()->name.' Disbursed '.$request->quality.' units of '.$item->name.' to '.$receiver->name );

            return back()->with('success', 'Item disbursed successfully');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function return(Request $request)
    {
        try
        {
            $receiver = User::find($request->member);

            if ($request->quantity == 0) {
                return back()->with('error', 'Specify the quantity to return, please check again.');
            }

            $item = InventoryActivity::create([
                'type' => 'Return',
                'quantity' => $request->quantity,
                'receiver_id' => $request->member,
                'user_id' => Auth::user()->id,
                'inventory_id' => $request->inventory_id,
                'inventory_item_id' => $request->inventory_item_id
            ]);

            $inventory_item = InventoryItem::find($request->inventory_item_id);

            if ($inventory_item->quantity < ($inventory_item->available + $request->quantity)) {
                return back()->with('error', 'Total item quantity exceeds expected value, please check again.');
            }

            $inventory_item->update([
                'available' => $inventory_item->available + $request->quantity
            ]);
            $inventory_item->save();
            
            activity()
            ->performedOn($item)
            ->causedBy(auth()->user())
            ->withProperties(['Item' => $item->id])
            ->log(auth()->user()->name.' Returned '.$request->quality.' units of '.$item->name.' to '.$receiver->name );

            return back()->with('success', 'Item disbursed successfully');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function returnToWareHouse(Request $request)
    {
        try
        {
            $receiver = User::find($request->member);

            // $item = InventoryActivity::create([
            //     'type' => 'Return',
            //     'quantity' => $request->quantity,
            //     'receiver_id' => $request->member,
            //     'user_id' => Auth::user()->id,
            //     'inventory_id' => $request->inventory_id,
            //     'inventory_item_id' => $request->inventory_item_id
            // ]);

            if ($request->quantity == 0) {
                return back()->with('error', 'Specify the quantity to return, please check again.');
            }

            $inventory_item = InventoryItem::find($request->inventory_item_id);
            $inventory_item->update([
                'available' => 0,
                'status_id' => config('returned')
            ]);
            $inventory_item->save();

            $inventory = Inventory::find($request->inventory_id);
            $warehouse_item = WarehouseItem::where('id',$inventory_item->warehouse_item_id)->first();

            if ($warehouse_item == null) {
                return back()->with('error', 'Warehouse item does not exist in warehouse any longer.');
            }

            // if ($warehouse_item->quantity < ($warehouse_item->available + $request->quantity)) {
            //     return back()->with('error', 'Total item quantity exceeds expected value, please check again.');
            // }

            $warehouse_item->update([
                'available' => $warehouse_item->available + $request->quantity
            ]);
            $warehouse_item->save();
            

            activity()
            ->performedOn($warehouse_item)
            ->causedBy(auth()->user())
            ->withProperties(['Item' => $warehouse_item->id])
            ->log(auth()->user()->name.' Returned '.$request->quality.' units of '.$warehouse_item->name.' to warehouse');

            return back()->with('success', 'Item Returned successfully');

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
