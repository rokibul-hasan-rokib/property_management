<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthlyBillRequest;
use App\Models\MonthlyRent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = MonthlyRent::all();
        return view('backend.about.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.bill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MonthlyBillRequest $request)
    {
       try {
        DB::beginTransactions();
        $bills = (new MonthlyRent())->storeBill($request);
        DB::commit();
        return redirect()->route('bills.index')->with('success','bill store successfully');
       } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->route('bills.index');
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
        return view('backend.bill.edit');
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
}
