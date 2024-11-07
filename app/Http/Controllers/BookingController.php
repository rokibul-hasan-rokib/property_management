<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = (new Booked)->getAllBookedLists();
        return view('backend.booked.index', compact("books"));
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
    public function store()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a booking.');
        }

        Booked::create([
            'user_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone_number,
        ]);
        alert_success(__('Booked Request Successfully Sent'));
        return redirect()->back()->with('success', 'Booking completed successfully!');
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
    public function edit(Booked $book)
    {
        return view('backend.booked.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booked $book)
    {
        try {
            DB::beginTransaction();
            (new Booked)->updateBooked($request, $book);
            DB::commit();
            return redirect()->route('booked.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booked $book)
    {
        try {
            DB::beginTransaction();
            (new Booked)->deleteBooked($book);
            DB::commit();
            return redirect()->route('booked.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}