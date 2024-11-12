<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthlyBillRequest;
use App\Models\MonthlyRent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;
use App\Mail\BillNotificationMail;
use App\Mail\UpdateBillNotificationMail;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = MonthlyRent::all();
        return view('backend.bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rents = (new MonthlyRent)->getAllUsers();
        // $users = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('backend.bill.create', compact('rents'));
        // return view('backend.bill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bill_name' => 'required|string|max:255',
            'bill_month' => 'required|string|max:255',
            'bill_house' => 'required|string|max:255',
            'bill_gas' => 'required|string|max:255',
            'bill_water' => 'required|string|max:255',
            'bill_water' => 'required|string|max:255',
            'bill_serviceCharge' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $user = User::find($request->user_id);
        $bill_month = $request->input('bill_month') . '-01';
        $bill = MonthlyRent::create(array_merge($request->all(), ['bill_month' => $bill_month]));

        $billDetails = [
            'user' => $user,
            'bill_name' => $bill->bill_name,
            'bill_month' => $bill->bill_month,
            'bill_gas' => $bill->bill_gas,
            'bill_water' => $bill->bill_month,
            'bill_house' => $bill->bill_house,
            'bill_serviceCharge' => $bill->bill_serviceCharge,
            'bill_electrity' => $bill->bill_electrity,
            'status' => $bill->status,
        ];
        alert_success(__('Bill Created Successfully'));
        Mail::to($user->email)->send(new BillNotificationMail($billDetails));
        return redirect()->route('bills.index')->with('success', 'Bill created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MonthlyRent $bill)
    {
        dd($$bill);
        return view('backend.bill.show',compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonthlyRent $bill)
    {
        $users = (new MonthlyRent)->getAllUsers();
        return view('backend.bill.edit', compact('bill', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bill_name' => 'required|string|max:255',
            'bill_month' => 'required|date_format:Y-m',  // Ensure it matches the input type
            'bill_house' => 'required|string|max:255',
            'bill_electrity' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);
        $user = User::find($request->user_id);
        $bill = MonthlyRent::findOrFail($id);
        $bill_month = $request->input('bill_month') . '-01';
        $bill->update(array_merge($request->all(), ['bill_month' => $bill_month]));
        Mail::to($user->email)->send(new UpdateBillNotificationMail($bill));
        alert_success(__('Bills Updated Successfully'));
        return redirect()->route('bills.index')->with('success', 'Bill updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bill = MonthlyRent::findOrFail($id);
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully.');
    }

    public function billingHistory()
    {
        $billingHistory = (new MonthlyRent)->getUserBillingHistory();
        return view('backend.bill.billingHistory', compact('billingHistory'));
    }
}