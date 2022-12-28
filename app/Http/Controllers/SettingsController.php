<?php

namespace App\Http\Controllers;

//models
use App\Models\Setting;
use App\Models\Config;

use Illuminate\Http\Request;

//traits
// use App\Traits\AppStatus;
// use App\Traits\CreateNotification;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billing = Config::where('category','billing')->get();
        $customer = Config::where('category','customer')->get();
        $order = Config::where('category','order')->get();
        $referral = Config::where('category','referral')->get();
        $payment = Config::where('category','payment')->get();
        $product = Config::where('category','product')->get();

        return view('admin.settings.index', [
            'product' => $product,
            'customer' => $customer,
            'billing' => $billing,
            'referral' => $referral,
            'payment' => $payment,
            'order' => $order
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
