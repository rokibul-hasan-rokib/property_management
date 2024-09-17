<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index',compact('contacts'));
    }
    public function index_front()
    {
        return view('frontend.contact.index');
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
    public function store(ContactRequest $request)
    {
         try {
            DB::beginTransaction();
            $contact = (new Contact())->storeContact($request);
            DB::commit();
            return redirect()->route('contact.front')->with('success','Contact Information Send Successfully');
         } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product: ' . $th->getMessage());
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
    public function destroy(Contact $contact)
    {
       try {
        DB::beginTransaction();
        (new Contact())->deleteContact($contact);
        DB::commit();
        return redirect()->route('contacts.index')->with('success','Deleted successfully');
       } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Failed to create product: ' . $th->getMessage());
       }
    }
}
