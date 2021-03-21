<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Expense;

use Illuminate\Support\Str;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Mail;
use DB;
use Paystack;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = "";
        $payments = "";
        
        if ($request->date == NULL) 
        {
            $date = DB::raw('CURDATE()');
        }
        else
        {
            $date = $request->date;
        }
        $payments = Payment::whereDate('created_at', $date)->get();

        $pending_payments = $payments->where('status_id', $this->pending)->sum('amount');
        $pending_payments_count = $payments->where('status_id', $this->pending)->count();
        
        $completed_payments = $payments->where('status_id', $this->paid)->sum('amount');
        $completed_payments_count = $payments->where('status_id', $this->paid)->count();
        
        $card = $payments->where('status_id', $this->paid)->where('type', 'card')->sum('amount');
        $card_count = $payments->where('status_id', $this->paid)->where('type', 'card')->count();
        
        $bank_transfer = $payments->where('status_id', $this->paid)->where('type', 'bank_transfer')->sum('amount');
        $bank_transfer_count = $payments->where('status_id', $this->paid)->where('type', 'bank_transfer')->count();
        
        $bank = $payments->where('status_id', $this->paid)->where('type', 'bank')->sum('amount');
        $bank_count = $payments->where('status_id', $this->paid)->where('type', 'bank')->count();

        $ussd = $payments->where('status_id', $this->paid)->where('type', 'ussd')->sum('amount');
        $ussd_count = $payments->where('status_id', $this->paid)->where('type', 'ussd')->count();

        $paystack = $bank_transfer + $card + $bank + $ussd;
        $paystack_count = $bank_transfer_count + $card_count + $bank_count + $ussd_count;
        
        $transfer = $payments->where('status_id', $this->paid)->where('type', 'transfer')->sum('amount');
        $transfer_count = $payments->where('status_id', $this->paid)->where('type', 'transfer')->count();
        
        $cash = $payments->where('status_id', $this->paid)->where('type', 'cash')->sum('amount');
        $cash_count = $payments->where('status_id', $this->paid)->where('type', 'cash')->count();
        
        
        
        $date = "";
        return view('admin.accounts.summary', [
            'payments' => $payments,
            'paid' => $this->paid,
            'pending' => $this->pending,

            'completed_payments' => $completed_payments,
            'completed_payments_count' => $completed_payments_count,
            
            'pending_payments' => $pending_payments,
            'pending_payments_count' => $pending_payments_count,

            'card' => $card,
            'card_count' => $card_count,

            'bank_transfer' => $bank_transfer,
            'bank_transfer_count' => $bank_transfer_count,

            'paystack' => $paystack,
            'paystack_count' => $paystack_count,

            'transfer' => $transfer,
            'transfer_count' => $transfer_count,
            
            'cash' => $cash,
            'cash_count' => $cash_count,

            'bank' => $bank,
            'bank_count' => $bank_count,
            
            'date' => $date
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
