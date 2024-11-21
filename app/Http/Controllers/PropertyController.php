<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertys = Property::all();
        return view('backend.property.index', compact('propertys'));
    }
    public function index_front()
    {
        $propertys = Property::all();
        return view('frontend.property.index',compact('propertys'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.property.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
    //    dd($request->all());
        try {
            DB::beginTransaction();
            $property = (new Property())->storeProperty($request);
            DB::commit();
            alert_success(__('Property Created Successfully'));
            return redirect()->route('propertys.index')->with("success", "Property Addedd Successfully");
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Property store failed', ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors('Failed to add property. Please try again.');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('frontend.property.show',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('backend.property.edit',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        try {
            DB::beginTransaction();
            (new Property())->updateProperty($request, $property);
            DB::commit();
            alert_success(__('Property Updated Successfully'));
            return redirect()->route('propertys.index')->with("success", "Property Updated Successfully");
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Property Updated failed', ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors('Failed to Updated property. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        try {
            DB::beginTransaction();
            (new Property())->deleteProperty($property);
            DB::commit();
            alert_success(__('Property Deleted Successfully'));
            return redirect()->route('propertys.index')->with("success", "Property Deleted Successfully");
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Property deleted failed', ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors('Failed to deleted property. Please try again.');
        }
    }
}