<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = (new Owner)->getAllOwners();
        return view('backend.owner.index',compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $owner = (new Owner())->storeOwner($request);
            DB::commit();
            alert_success(__('Owner Created Successfully'));
            return redirect()->route('owners.index')->with('success', "Owner Created Successfully");
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
    public function edit(Owner $owner)
    {
        return view('backend.owner.edit',compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        try {
            DB::beginTransaction();
            (new Owner())->updateOwner($request, $owner);
            DB::commit();
            alert_success(__('Owner Updated Successfully'));
            return redirect()->route('owners.index')->with('Success',"Owner created Successfully0");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        try {
            DB::beginTransaction();
            (new Owner())->deleteOwner($owner);
            DB::commit();
            alert_success(__('Owner Deleted Successfully'));
            return redirect()->route('owners.index')->with('success', "Owner Created Successfully");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}