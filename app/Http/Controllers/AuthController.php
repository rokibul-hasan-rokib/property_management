<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loadRegister(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'current_address' => 'nullable|string|max:255',
            'employment_status' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric|min:0',
            'nid' => 'required|string|max:255',
            'emergency_contact' => 'nullable|string|max:255',
            'preferred_move_in_date' => 'nullable|date',
            'has_pets' => 'nullable|boolean',
            'rental_budget' => 'nullable|numeric|min:0',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);
        
        $user->sendOtpNotification();

        return redirect()->route('verification.notice');

        return redirect()->route('login.page');
    }

    public function loadLogin(){
        return view('auth.login');
    }

    public function userLogin(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required',
        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            return redirect('/');
        }else{
            return back()->with('error','Email and Password is incorrect');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }


}