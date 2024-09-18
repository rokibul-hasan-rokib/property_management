<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('',compact('abouts'));
    }
    public function index_front()
    {
        return view('frontend.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        try {
            DB::beginTransaction();
            $about = (new About())->storeAbout($request);
            DB::commit();
            return redirect()->route('abouts.index')->with('success',"About create successfully");
        } catch (\Throwable $th) {
            Db::rollBack();
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
    public function edit(About $about)
    {
        return view('backend.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        try {
            DB::beginTransaction();
            (new About())->updateAbout($request, $about);
            DB::commit();
            return redirect()->route('abouts.index')->with('success','About Updated Successfully completed');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        try {
            DB::beginTransaction();
            (new About())->deleteAbout($about);
            DB::commit();
            return redirect()->route('abouts.index')->with('success','About Deleted Successsfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}
