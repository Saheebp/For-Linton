<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Backend\HomeController;

//models
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        //dd($paid);
        $this->middleware('auth');
        $this->middleware('permission:manage products', ['only' => ['create', 'store', 'show', 'edit'. 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $attibutes = Attributes::all();
        $categories = Category::all();

        return view('admin.products.index', [
            'brands' => $brands,
            'categories' => $categories,
            'attibutes' => $attibutes
        ]);
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
        ///dd($request->toArray());
        $this->validate($request, [
            'name' => 'required|string',
            'category' => 'required',
            'brand'  => 'required',
            'description'  => 'string|max:225',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|numeric',
            'price'  => 'required|numeric'
        ]);

        $image1 = "";
        $image2 = "";
        $image3 = "";

        if ($request->file('image1')->isValid()) {
            $image1 = $this->upload($request->image1);
        }

        if ($request->file('image2')->isValid()) {
            $image2 = $this->upload($request->image2);
        }

        if ($request->file('image3')->isValid()) {
            $image3 = $this->upload($request->image3);
        }

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'description' => $request->description,
            'rating' => 0,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'quantity' => $request->quantity,
            'amount' => $request->price,
        ]);

        //log activity
        try {

            activity()
            ->performedOn($product)
            ->causedBy(auth()->user())
            ->withProperties([
                'productName' => $product->name,
                'quantity' => $product->quantity,
                'price' => $product->price
                ])
            ->log('A Product Was added by :causer.name { Name- :properties.productName, Quantity- :properties.quantity, price- :properties.price');

        } catch (\Exception $e) {
            error_log($e->getMessage());
        }


        return redirect()->route('admin.products.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $brands = Brand::all();
        $attibutes = Attributes::all();
        $categories = Category::all();

        return view('admin.products.edit', [
            'brands' => $brands,
            'categories' => $categories,
            'attibutes' => $attibutes,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $this->validate($request, [
            'name' => 'string',
            'description'  => 'string|max:225',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'numeric',
            'price'  => 'numeric',
        ]);
        
        $image1 = null;
        $image2 = null;
        $image3 = null;

        if ($request->file('image1')->isValid()) {
            $image1 = $this->upload($request->image1);
        }

        if ($request->file('image2')->isValid()) {
            $image2 = $this->upload($request->image2);
        }

        if ($request->file('image3')->isValid()) {
            $image3 = $this->upload($request->image3);
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'description' => $request->description,
            'rating' => 0,
            'image1' => isset($image1) ? $image1 : $product->image1,
            'image2' => isset($image2) ? $image2 : $product->image2,
            'image3' => isset($image3) ? $image3 : $product->image3,
            'quantity' => $request->quantity,
            'amount' => $request->price,
        ]);

        try {

            activity()
            ->performedOn($product)
            ->causedBy(auth()->user())
            ->withProperties([
                'productName' => $product->name,
                'quantity' => $product->quantity,
                'price' => $product->price
                ])
            ->log('A Product was updated by :causer.name { Name- :properties.productName, Quantity- :properties.quantity, price- :properties.price');

        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

        return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            activity()
            ->performedOn($product)
            ->causedBy(auth()->user())
            ->withProperties([
                'productName' => $product->name,
                'quantity' => $product->quantity,
                'price' => $product->price
                ])
            ->log('A Product Was deleted by :causer.name { Name- :properties.productName, Quantity- :properties.quantity, price- :properties.price');

        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

        $product->delete();

        return back()->with('success', 'Product Deleted Successfully');
    }

    public function upload($file)
    {
        //$extension = $request->avatar->extension();
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/products', $file_name);

        return $path;
    }

    public function toggleProduct(Product $product)
    {
        if ($product->visibility) 
        {
            $product->update([ 'visibility' => false ]);
            return back()->with('success', 'Product Disabled Successfully');
        } 
        else 
        {
            $product->update([ 'visibility' => true ]);
            return back()->with('success', 'Product Enable Successfully');
        }
    }
}
