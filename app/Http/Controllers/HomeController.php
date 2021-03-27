<?php

namespace App\Http\Controllers;

use View;
use App\Notifications\ContactUs;
use Notification;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeOption;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // $customers = User::role('Customer')->whereDate('created_at', Carbon::now())->get()->count();
        // $products = Product::all()->count();
        
        return view('admin.dashboard', [
            'customers' => 0,
            'products' => 0
        ]);
    }

    public function index()
    {
        return view('home');   
    }

    public function home()
    {
        return view('home');   
    }

    public function about()
    {
        return view('about');   
    }

    public function terms()
    {
        return view('terms');   
    }

    public function shop()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        $options = AttributeOption::all();

        return view('shop', [
            'categories' => $categories,
            'attributes' => $attributes,
            'options' => $options
        ]);
    }

    public function contact()
    {
        return view('contact');   
    }

    public function wishlist()
    {
        return view('wishlist');   
    }

    public function account()
    {
        return view('account');   
    }

    public function checkout()
    {
        return view('checkout');   
    }

    public function cart()
    {
        return view('cart');   
    }

    public function detail()
    {
        return view('product-detail');   
    }

    public function locations()
    {
        return view('locations');   
    }

    public function track()
    {
        return view('track');   
    }
}