<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryItem;
use App\Models\Warehouse;
use App\Models\WarehouseItem;
use App\Models\WarehouseActivity;
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
                'status_id' => config('available'),
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
        
        $item = WarehouseItem::find($request->item);
        $project = Project::find($request->project);
        
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
        $warehouse_id = 1;
        try
        {
            $project = Project::find($request->project);
            $item = WarehouseItem::find($request->item);
            
            if ($item == NULL) {
                return redirect()->route('warehouse.index')->with('success', 'Target inventory not found');
            }

            if ($item->available == 0) 
            {   
                $item->status_id = config('unavailable');
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
            if ($inventory == NULL) {
                return redirect()->route('warehouse.index')->with('error', 'Target inventory not found, please create an inventory for the target Project');
            }
            
            InventoryItem::create([
                'name' => $item->name,
                'quantity' => $request->quantity, 
                'available' => $request->quantity, 
                'threshold' => 1,
                'created_by' => Auth::user()->id,
                'batch_id' => $item->batch_id,
                'image' => $item->image,
                'status_id' => config('available'),
                'category_id' => $item->category_id,
                'inventory_id' => $inventory->id,
                'warehouse_item_id' => $item->id
            ]);

            $data = array();
            $data['body'] = auth()->user()->name." disbursed a supply of ".$request->quantity." units of ".$item->name." to inventory";
            $data['project_id'] = $inventory->project_id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;
            $this->createLog($data);

            WarehouseActivity::create([
                'type' => 'allocation',
                'quantity' => $request->quantity,
                'project' => $project->name,
                'project_id' => $project->id,
                'user_id' => Auth::user()->id,
                'warehouse_id' => $warehouse_id,
                'warehouse_item_id' => $item->id
            ]);

            return redirect()->route('warehouse.index')->with('success', $item->name.' Item Allocated successfully');

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
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'category' => 'required|numeric',
            'batch' => 'required|numeric',
            'status' => 'required|numeric'
        ]);

        try
        {
            $WarehouseItem = WareHouseItem::find($request->id);

            $WarehouseItem->name =  $request->get('name');
            $WarehouseItem->quantity = $request->get('quantity');
            $WarehouseItem->category_id = $request->get('category');
            $WarehouseItem->batch_id = $request->get('batch');
            $WarehouseItem->status_id = $request->get('status');
            $WarehouseItem->save();

            return back()->with('success', 'Update successful');

        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', $e->getMessage());
        }
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


     /**
     * Remove the specified resource from available items.
     *
     * @param  \App\Models\WarehouseItem  $WarehouseItem
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, WarehouseItem $WarehouseItem)
    {
        try
        {
            
            $WarehouseItem = WareHouseItem::find($request->id);
            
            if ($WarehouseItem != null && $WarehouseItem->quantity != $WarehouseItem->available) 
            {
                $WarehouseItem->delete();
                return back()->with('success', 'Deleted successfully');
            }
            else
            {
                return back()->with('error', 'Item not found or some of this item category is currently disbursed');
            }

        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', $e->getMessage());
        }
    }
}
