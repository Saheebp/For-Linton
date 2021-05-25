<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryItem;
use App\Models\Warehouse;
use App\Models\WarehouseItem;
use App\Models\Project;

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
     * @param  \App\Models\WarehouseItem  $WarehouseItem
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseItem $WarehouseItem
)
    {
        //
    }

    public function allocatePreview(Request $request)
    {
        $validate = $request->validate([
            'project' => 'required|string|max:255',
            'quantity' => 'required|numeric',
        ]);

        $project = Project::find($request->project);
        $item = WarehouseItem::find($request->item);

        if ($item->available > $request->quantity) 
        {
            return view('admin.warehouse.allocate', [
                'item' => $item,
                'project' => $project,
                'quantity' => $request->quantity
            ]);
        }
        else
        {
            return back()->with('error', 'Insufficient quantity available');
        }
    }

    public function allocate(Request $request)
    {
        try
        {
            $project = Project::find($request->project);
            $item = WarehouseItem::find($request->item);
            
            if ($item == NULL) {
                return redirect()->route('warehouse.index')->with('success', 'Target inventory not found');
            }

            if ($item->available == 0) {
                
                $item->status_id = $this->unavailable;
                $item->save();
                return back()->with('error', 'Insufficient quantity available');
            }

            if ($item->available < $request->quantity) 
            {
                return back()->with('error', 'Insufficient quantity available');
            }
            
            $item->available = $item->available - $request->quantity;
            $item->save();
            

            $inventory = Inventory::where('project_id',$project->id)->first();
            
            InventoryItem::create([
                'name' => $item->name,
                'quantity' => $request->quantity, 
                'available' => $request->quantity, 
                'threshold' => 1,
                'created_by' => Auth::user()->id,
                'batch_id' => $item->batch_id,
                'image' => $item->image,
                'status_id' => $this->available,
                'category_id' => $item->category_id,
                'inventory_id' => $inventory->id
            ]);

            return redirect()->route('warehouse.index')->with('success', $item->name.'Item Allocated successfully');

        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseItem  $WarehouseItem
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseItem $WarehouseItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseItem  $WarehouseItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseItem $WarehouseItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseItem  $WarehouseItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseItem $WarehouseItem)
    {
        //
    }
}
