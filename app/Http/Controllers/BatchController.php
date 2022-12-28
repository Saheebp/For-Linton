<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

use Auth;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.warehouse.batches', [
            'batches' => $batches,
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
        ]);

        try 
        {
            Batch::create([
                'name' => $request->name
            ]);

            return back()->with('success', 'Batch created successfully.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a Batch");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try
        {
            $batch = Batch::find($request->id);

            $batch->name =  $request->get('name');
            $batch->save();

            return back()->with('success', 'Update successful');

        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }

    public function delete(Request $request)
    {
        try
        {
            
            $batch = Batch::find($request->id);
            
            if ($batch != null) 
            {
                $batch->delete();
                return back()->with('success', 'Deleted successfully');
            }
            else
            {
                return back()->with('error', 'Item not found');
            }

        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', 'This item cannot be deleted at the moment, it may have active intventory items attached to it');
        }
    }
}
