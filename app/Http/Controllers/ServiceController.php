<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $services = Service::all();
         return view('backend.service.index',compact('services'));
    }
    public function index_front(){
        return view('frontend.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
         try {
            DB::beginTransaction();
            $service = (new Service())->storeService($request);
            DB::commit();
            return redirect()->route('')->with('success','Service store successfully completed');
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
    public function edit(Service $service)
    {
        return view('backend.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        try {
            DB::beginTransaction();
            (new Service())->updateService($request, $service);
            DB::commit();
            return redirect()->route('')->with('success','updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            DB::beginTransaction();
            (new Service())->destroyService($service);
            DB::commit();
            return redirect()->route('')->with('success',"deleted successfully");        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();        }
    }
}
