<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('name','!=', 'SuperUser')->get();
        $permissions = Permission::all();
        
        return view('admin.permissions.index', [
            'roles' => $roles,
            'role_id' => null,
            'role_name' => null,
            'permissions' => $permissions
        ]);
    }

    public function showPermission($role_id)
    {
        $role = Role::where('id',$role_id)->first();

        if ($role != null) 
        {
            $role_id = $role->id;
            $role_name = $role->name;

            $roles = Role::where('name','!=', 'SuperUser')->get();

            $permissions = Permission::all();
            $display = array();
            foreach($permissions as $permission)
            {
                $display[$permission->id]['id'] = $permission->id;
                $display[$permission->id]['name'] = $permission->name;
                
                if($role->hasPermissionTo($permission['name'])) {
                    $display[$permission->id]['status'] = 'checked';
                }else{
                    $display[$permission->id]['status'] = '';
                }
            }

            return view('admin.permissions.index', [
                'role_id' => $role_id,
                'role_name' => $role_name,
                'roles' => $roles,
                'permissions' => $display,
            ]);
        }
        return back()->with('error', 'Records not found for that request, try again');
    }

    
    public function syncRolePermissions(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->syncPermissions($request->permissions);
        
        activity()
        ->performedOn($role)
        ->causedBy(auth()->user())
        ->withProperties(['Name' => $role->name])
        ->log(auth()->user()->name.' Updated Permision for : '.$role->name );

        return redirect()->route('permissions.index')->with("success","Permissions for ".$role->name." updated successfully !");
    }

    public function syncUserPermissions(Request $request)
    {
        $user = User::find($request->user_id);
        // $current_permissions = $user->getDirectPermissions();
        $user->syncPermissions($request->permissions);
        
        activity()
        ->performedOn($user)
        ->causedBy(auth()->user())
        ->withProperties(['Name' => $user->name])
        ->log(auth()->user()->name.' Updated Permision for : '.$user->name );

        return back()->with("success","Permissions for ".$user->name." updated successfully !");
    }

    public function addPermissionToUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->givePermissionTo($request->permission);
        
        activity()
        ->performedOn($user)
        ->causedBy(auth()->user())
        ->withProperties(['Name' => $user->name])
        ->log(auth()->user()->name.' Updated Permision for : '.$user->name );

        return redirect()->back()->with("success","Permission updated successfully !");
    }

    //admin adding a users permssion
    public function removePermissionToUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->revokePermissionTo($request->permission);
        
        activity()
        ->performedOn($user)
        ->causedBy(auth()->user())
        ->withProperties(['Name' => $user->name])
        ->log(auth()->user()->name.' Updated Permision for : '.$user->name );

        return redirect()->back()->with("success","Permission updated successfully !");
    }
}
