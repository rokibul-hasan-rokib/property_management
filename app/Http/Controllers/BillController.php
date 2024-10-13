<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthlyBillRequest;
use App\Models\MonthlyRent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = MonthlyRent::all();
        return view('backend.bill.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rents = (new MonthlyRent)->getAllUsers();
        // $users = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('backend.bill.create', compact('rents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MonthlyBillRequest $request)
    {
        // dd($request->all());
       try {
        DB::beginTransactions();
        (new MonthlyRent())->storeBill($request);
        DB::commit();
        return redirect()->route('bills.index')->with('success','bill store successfully');
       } catch (\Throwable $th) {
        DB::rollBack();
        Log::error('Failed to store bill', [
            'error' => $th->getMessage(),
            'request' => $request->all() // Optionally log the request data for debugging
        ]);
        return redirect()->back();
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonthlyRent $bill)
    {
        $users = (new MonthlyRent)->getRentsWithUsers();
        return view('backend.bill.edit',compact('bill','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MonthlyRent $bill)
    {
      try {
        DB::beginTransactions();
        (new MonthlyRent())->updateBill($request, $bill);
        DB::commit();
        return redirect()->route('bills.index')->with('success','updated successfully');
      } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->route('bills.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonthlyRent $bill)
    {
        try {
            DB::beginTransactions();
            (new MonthlyRent())->deleteBill($bill);
            DB::commit();
            return redirect()->route('bills.index')->with('success','Deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('bills.index');
        }
    }

    public function billingHistory()
    {
        $billingHistory = (new MonthlyRent)->getUserBillingHistory();
        return view('backend.bill.billingHistory', compact('billingHistory'));
    }
}