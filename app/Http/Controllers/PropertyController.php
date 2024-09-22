<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertys = Property::all();
        return view('backend.property.index',compact('propertys'));
    }
    public function index_front()
    {
        return view('frontend.property.index');
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
        // dd($request->all());
        try {
            DB::beginTransaction();
            $property = (new Property())->storeProperty($request);
            DB::commit();
            return redirect()->route('propertys.index')->with("success","Property Addedd Successfully");
         } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Property store failed', ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors('Failed to add property. Please try again.');
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
    public function destroy(string $id)
    {
        //
    }
}
