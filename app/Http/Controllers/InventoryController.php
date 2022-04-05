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

use App\Imports\InventoryImport;
use Maatwebsite\Excel\Facades\Excel;

use Auth;

class InventoryController extends Controller
{

    public function __construct()
    {
    }

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
                'status_id' => config('new'),
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

    public function uploadItems(Request $request, Project $project)
    {
        // $validated = $request->validate([
        //     // 'name' => 'required|string|max:255',
        //     // 'description' => 'required|string|max:255',
        //     'inventoryfile' => 'required|mimes:csv,xlx,xlxs,xls|max:2048'
        // ]);
        
        $file = $request->file('inventoryfile');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $fileextension = $file->getClientOriginalExtension();
        $fileurl = $file->storeAs('uploads', $filename);

        Excel::import(new InventoryImport, $fileurl);
        return back()->with('success', 'Items added successfully.');

        try
        {
            Excel::import(new InventoryImport, 'inventory.xlsx');
            return back()->with('success', 'Items added successfully.');
        }
        catch (\Exception $e) 
        {   
            return back()->with('error', "Oops, Error adding Items to Inventory");
        }
    }
}
