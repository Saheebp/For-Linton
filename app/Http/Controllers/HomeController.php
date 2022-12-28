<?php

namespace App\Http\Controllers;

use View;
use App\Notifications\ContactUs;
use Notification;

use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Quote;
use App\Models\RequestFq;
use App\Models\InventoryActivity;

use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
        $projects = Project::all();
        $all_projects = Project::all();
        $tasks = Task::orderBy('end', 'DESC')->get();
        $users = User::where('name','!=','Super User')->get();
        $inventory_history = InventoryActivity::all();

        $chart_options = [
            'chart_title' => 'Projects by Completion',
            'report_type' => 'group_by_relationship',
            'relationship_name' => 'status',
            'model' => 'App\Models\Project',
            'group_by_field' => 'name',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'filter_period' => 'year', // show users only registered this month
        ];
        $chart1 = new LaravelChart($chart_options);
        
        
        $chart_options = [
            'chart_title' => 'Projects by Completion',
            'report_type' => 'group_by_relationship',
            'relationship_name' => 'status',
            'model' => 'App\Models\Project',
            'group_by_field' => 'name',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'filter_period' => 'month', // show users only registered this month
        ];
        $chart2 = new LaravelChart($chart_options);

        if (auth()->user()->is_contractor == 'true') 
        {
            $quotes = Quote::where('user_id', auth()->user()->id)
            ->where('status_id', config('pending'))->get();
            
            if ($quotes->isEmpty()) {
                $status = 'closed';
            }else{
                $status = 'open';
            }

            return view('upload', [
                'quotes' => $quotes,
                'status' => $status
            ]);
        }
        return view('admin.dashboard', [
            'all_projects' => $all_projects,
            'inventory_history' => $inventory_history,
            'projects' => $projects,
            'users' => $users,
            'tasks' => $tasks,
            'chart1' => $chart1,
            //'chart2' => $chart2
        ]);
    }

    public function documents()
    {
        $quotes = Quote::where('user_id', auth()->user()->id)
            ->where('status_id', config('pending'))->get();
        
        if ($quotes->isEmpty()) {
            $status = 'closed';
        }else{
            $status = 'open';
        }

        return view('upload', [
            'quotes' => $quotes,
            'status' => $status
        ]);
    }

    public function index()
    {
        $quotes = Quote::where('user_id', auth()->user()->id)->get();
        
        return view('welcome', [
            'quotes' => $quotes
        ]);
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

    // public function shop()
    // {
    //     $categories = Category::all();
    //     $attributes = Attribute::all();
    //     $options = AttributeOption::all();

    //     return view('shop', [
    //         'categories' => $categories,
    //         'attributes' => $attributes,
    //         'options' => $options
    //     ]);
    // }

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

    // public function checkout()
    // {
    //     return view('checkout');   
    // }

    // public function cart()
    // {
    //     return view('cart');   
    // }

    // public function detail()
    // {
    //     return view('product-detail');   
    // }

    // public function locations()
    // {
    //     return view('locations');   
    // }

    // public function track()
    // {
    //     return view('track');   
    // }
}