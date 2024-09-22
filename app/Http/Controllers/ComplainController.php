<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplainRequest;
use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complains = Complain::all();
        return view('backend.complain.index',compact('complains'));
    }
    public function index2(){
        return view('frontend.complain.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplainRequest $request)
    {

        // dd($request->all());
            try {
                DB::beginTransaction();
                $complain = (new Complain())->storeComplain($request);
                DB::commit();
                return redirect()->route('complain.front')->with('success','Your complain send successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error('Comlain store failed', ['error' => $th->getMessage()]);
                return redirect()->back()->withErrors('Failed to add complain. Please try again.');
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
    public function destroy(Complain $complain)
    {
        try {
            DB::beginTransaction();
            (new Complain())->deleteComplain($complain);
            DB::commit();
            return redirect()->route('complains.index')->with('success','deleted successfully completed');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Comlain deleted failed', ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors('Failed to deleted complain. Please try again.');
        }
    }
}
