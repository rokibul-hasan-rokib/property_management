<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('backend.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
          try {
            DB::beginTransaction();
            $customer = (new Customer())->storeCustomer($request);
            DB::commit();
            return redirect()->route('customers.index')->with('success','store successfully');
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
    public function edit(Customer $customer)
    {
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Customer $customer)
    {

        try {
            DB::beginTransaction();
            (new Customer())->updateCustomer($request,$customer);
            DB::commit();
            return redirect()->route('customers.index')->with('success','Customer Updated Successfully');
          } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
          }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {

        try {
            DB::beginTransaction();
            (new Customer())->deleteCustomer($customer);
            DB::commit();
            return redirect()->route('customers.index')->with('success','customer deleted Successfully');
          } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
          }

    }
}
