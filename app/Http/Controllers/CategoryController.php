<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

use Auth;

//traits
// use App\Traits\AppStatus;
// use App\Traits\CreateNotification;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.warehouse.categories', [
            'categories' => $categories,
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
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        try 
        {
            Category::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return back()->with('success', 'Category created successfully.');
        }
        catch (\Exception $e) 
        {
            //dd($e);
            return back()->with('error', "Oops, Error Creating a Category");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try
        {
            $category = Category::find($request->id);

            $category->name =  $request->get('name');
            $category->save();

            return back()->with('success', 'Update successful');

        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function delete(Request $request)
    {
        try
        {
            
            $category = Category::find($request->id);
            
            if ($category != null) 
            {
                $category->delete();
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
