<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Designation;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Spatie\Activitylog\Models\Activity;

use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designations = Designation::all();
        $roles = Role::all();
        $users = User::where('is_admin','true')->get();
        $nonsuper = $users->reject(function ($user, $key) {
            return $user->hasRole('Level 1');
        });

        if(auth()->user()->hasRole('Level 1'))
        {
            return view('admin.users.index', [
                'users' => $users,
                'roles' => $roles,
                'designations' => $designations
            ]);
        }

        return view('admin.users.index', [
            'users' => $nonsuper,
            'roles' => $roles,
            'designations' => $designations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|digits:11|numeric|unique:users',
        ])->validate();

        try
        {
            $role = $request->role;

            $user = User::create([
                'name' => isset($request->name)? $request->name : '', 
                'email' => $request->email,
                'phone' => $request->phone,

                'nok_name' => isset($request->nok_name) ? $request->nok_name : '', 
                'nok_phone' => isset($request->nok_phone) ? $request->nok_phone : '', 

                'address' => NULL,
                'avatar' => NULL,
                'address' => NULL,
                'profile_update_status' => NULL,

                'is_admin' => $request->is_admin,
                'is_contractor' => $request->is_contractor,

                'status_id' => $request->status_id,
                'password' => Hash::make('123456'),
                'designation_id' => $request->designation,

                'org_name' => isset($request->org_name)? $request->org_name : '', 
                'org_email' => $request->org_email,
                'org_phone' => $request->org_phone,
                'org_address' => $request->org_address,

            ]);
            
            $user->assignRole($role);

            activity()
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->withProperties(['User' => $user->id])
            ->log(auth()->user()->name.' Created : '.$user->name );

            return back()->with('success', 'User added successfully.');
        } 
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Creating a User records");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('is_admin','true')->where('id', $id)->first();
        $logs = Activity::where('causer_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        $roles = Role::all();
        
        return view('admin.users.show', 
        [
            'user' => $user,
            'logs' => $logs,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|digits:11|numeric|unique:users',
        ])->validate();

        try
        {
            //$role = $request->role;
            $user = User::where('id',$request->id)->update([
                'name' => isset($request->name)? $request->name : '', 
                'email' => $request->email,
                'phone' => $request->phone,

                'nok_name' => isset($request->nok_name) ? $request->nok_name : '', 
                'nok_phone' => isset($request->nok_phone) ? $request->nok_phone : ''
            ]);

            activity()
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->withProperties(['User' => $user->id])
            ->log(auth()->user()->name.' Updated profile for : '.$user->name );

            //$user->assignRole($role);
            return back()->with('success', 'User updated successfully.');
        } 
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating User records");
        }
    }

    public function bioupdate(Request $request)
    {
        Validator::make($request->all(), [
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'phone' => 'required|digits:11|numeric|unique:users,phone,'.$request->id
        ])->validate();
        
        try
        {
            $user = User::where('id',$request->id)->first();
            $user->update([
                'name' => isset($request->name)? $request->name : '', 
                'email' => $request->email,
                'phone' => $request->phone,

                'nok_name' => isset($request->nok_name) ? $request->nok_name : '', 
                'nok_phone' => isset($request->nok_phone) ? $request->nok_phone : ''
            ]);
            
            activity()
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->withProperties(['User' => $user->id])
            ->log(auth()->user()->name.' Updated Bio Data for : '.$user->name );

            //$user->assignRole($role);
            return back()->with('success', 'User updated successfully.');
        } 
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating User records");
        }
    }

    public function passwordupdate(Request $request)
    {
        Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed'
        ])->validate();
      
        try
        {
            $user = User::where('id',$request->id)->where('is_admin','true')->first();
            if($user != NULL)
            {
                
                if(Hash::check($request->oldpassword, $user->password)) 
                {
                    // The passwords match...
                    $user->update([ 
                        'password' => Hash::make($request->password) 
                    ]);

                    activity()
                    ->performedOn($user)
                    ->causedBy(auth()->user())
                    ->withProperties(['User' => $user->id])
                    ->log(auth()->user()->name.' Updated password for : '.$user->name );
        
                    // get current user
                    $currentuser = Auth::user();

                    // logout user
                    $userToLogout = User::find($user->id);
                    Auth::setUser($userToLogout);
                    Auth::logout();

                    // set again current user
                    Auth::setUser($currentuser);

                    return redirect()->route('login')->with('success', 'Your Password has been reset successfully, Login to continue');
                }
                else
                {
                    return back()->with('error', 'Oops! Your Old Password is not correct!');
                }
            }
            else
            { 
                return back()->with('error', 'Oops! No record found!'); 
            }
        } 
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating User Password ");
        }
    }

    public function roleupdate(Request $request)
    {
       try
        {
            $role = $request->role;
            $user = User::where('id',$request->id)->first();

            activity()
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->withProperties(['User' => $user->id])
            ->log(auth()->user()->name.' Updated role for : '.$user->name.' to '.$role );

            if($user != null)
            {
                $user->syncRoles($role);
                return back()->with('success', 'User Role updated successfully.');
            }else{
                return back()->with('error', 'User Role not updated successfully.');
                
            }
        } 
        catch (\Exception $e) 
        {
            return back()->with('error', "Oops, Error Updating User Role");
        }
    }

    public function codeupdate(Request $request)
    {
    //    try
    //     {
    //         $role = $request->role;
    //         $user = User::where('id',$request->id)->first();

    //         activity()
    //         ->performedOn($user)
    //         ->causedBy(auth()->user())
    //         ->withProperties(['User' => $user->id])
    //         ->log(auth()->user()->name.' Updated role for : '.$user->name.' to '.$role );

    //         if($user != null)
    //         {
    //             $user->syncRoles($role);
    //             return back()->with('success', 'User Role updated successfully.');
    //         }else{
    //             return back()->with('error', 'User Role not updated successfully.');
                
    //         }
    //     } 
    //     catch (\Exception $e) 
    //     {
    //         return back()->with('error', "Oops, Error Updating User Role");
    //     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //search from bookings list
    public function search(Request $request){

        $data = $request->data;
        $title = "";

        $roles = Role::all();

        $users = User::where('is_admin', 'true')
        ->where('name', 'LIKE', '%' . $data . '%')
        ->orWhere('phone', 'LIKE', '%' . $data . '%')
        ->orWhere('email', 'LIKE', '%' . $data . '%')
        ->orderBy('created_at', 'desc')->paginate(50);

        if ($users != null) {
            $title = "containing : ".$data;
        }

        return view('admin.users.index', 
        [
            'users' => $users,
            'title' => $title,
            'roles' => $roles
        ]);
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.email');
    }
}