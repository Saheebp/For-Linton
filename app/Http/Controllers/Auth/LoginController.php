<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','adminLogin');
    }

    public function adminLogin()
    {
        return view('backend.auth.login');
    }

    public function gotoLogin()
    {
        return redirect()->route('admin.login');
    }
    
    public function authenticated(Request $request, $user) 
    {
        if ($user->is_admin == "true") {
            return redirect()->route('admin.home');
            //return redirect(session('link'));
        } else {
            //return redirect()->route('upload');
            return redirect()->route('welcome');
        }
    }

    public function showLoginForm()
    {
        if (!session()->has('link')) {
           
            session(['link' => url()->previous()]);
        }
        return view('auth.login');
    }
}
