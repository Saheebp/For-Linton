<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topcustomers = User::role('Customer')->orderBy('order_count', 'desc')->take(10)->get();
        $customers = User::role('Customer')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.customers.index', [
            'topcustomers' => $topcustomers,
            'customers' => $customers
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function search(Request $request){
        $data = $request->data;
        $title = "";

        $customers = User::where('is_admin', 'false')
        ->where('name', 'LIKE', '%' . $data . '%')
        ->orWhere('phone', 'LIKE', '%' . $data . '%')
        ->orWhere('email', 'LIKE', '%' . $data . '%')
        ->orderBy('created_at', 'desc')->paginate(50);

        $topcustomers = User::role('Customer')->orderBy('booking_count', 'desc')->take(10)->get();
        
        if ($customers != null) {
            $title = "containing : ".$data;
        }

        return view('customers.index', 
        [
            'topcustomers' => $topcustomers,
            'customers' => $customers,
            'title' => $title,


            // 'paid' => $this->paid,
            // 'pending' => $this->pending,
            // 'in_progress' => $this->in_progress,
            // 'completed' => $this->completed,
            // 'filledup' => $this->filledup,
            // 'suspended' => $this->suspended,
            // 'cancelled' => $this->cancelled,
        ]);       
    }

    public function bioupdate(Request $request)
    {
        Validator::make($request->all(), [
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'phone' => 'required|digits:11|numeric|unique:users,phone,'.$request->id,
            'address' => 'required|string|max:255',
        ])->validate();
        
        try
        {
            $user = User::where('id',$request->id)->first();
            $user->update([
                'name' => isset($request->name)? $request->name : '', 
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,

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

    public function passwordreset($user_id)
    {
        try
        {
            $user = User::where('id',$user_id)->where('is_admin','false')->first();
            if($user != NULL)
            {
                $password = Str::random(8);
                $user->update([ 
                    'password' => Hash::make($password) 
                ]);

                 //send sms with booking status 
                $receiver = $user->phone;
                $sender = "VALGEETS";
                $message = "Login to your VALGEE account with Email : ".$user->email.", Password : ".$password.". Thanks for choosing us";
                $this->sendsms($receiver, $sender, $message);
            
                activity()
                ->performedOn($user)
                ->causedBy(auth()->user())
                ->withProperties(['User' => $user->id])
                ->log(auth()->user()->name.' Reset password for : '.$user->name );

                return redirect()->back()->with('success', 'Customer Password has been reset successfully, Login to continue');
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
}
