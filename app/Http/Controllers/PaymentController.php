<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('backend.payment.index',compact('payments'));
    }

    public function month_details(){
    $payments = Payment::all();

    $monthlyTotals = Payment::select('month', DB::raw('SUM(amount) as total_amount'))
        ->groupBy('month')
        ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
        ->get();

    return view('backend.payment.month-payment', compact('payments', 'monthlyTotals'));
    }

    public function index2(){
        return view('frontend.payment.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        // dd($request->all());
            try {
                DB::beginTransaction();
                $payment = (new Payment())->storePayment($request);
                DB::commit();
                return redirect()->route('example2')->with('success',"Payment successfull");
            } catch (\Throwable $th) {
                DB::rollBack();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        try {
            DB::beginTransaction();
            (new Payment())->deletePayment($payment);
            DB::commit();
            return redirect()->back()-with('success','Deleted Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}