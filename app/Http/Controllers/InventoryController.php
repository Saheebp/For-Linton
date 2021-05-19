<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Category;
use App\Models\Status;
use App\Models\Project;
use App\Models\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

use Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::all();
        $statuses = Status::all();
        $categories = Category::all();
        $projects = Project::all();
        $inventories = Inventory::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.inventories.index', [
            'items' => $items,
            'categories' => $categories,
            'statuses' => $statuses,
            'projects' => $projects,
            'inventories' => $inventories
        ]);
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'project' => 'required'
        ]);

        try 
        {
            Inventory::create([
                'name' => $request->name,
                'description' => $request->description,
                'project_id' => $request->project,
                'status_id' => $this->new,
            ]);

            return back()->with('success', 'Inventory created successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Creating a Inventory");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        $statuses = Status::all();
        
        return view('admin.inventories.show', [
            'inventory' => $inventory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
