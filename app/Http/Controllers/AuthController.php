<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loadRegister()
    {
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
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'g-recaptcha-response' => 'required|captcha',
        ]);



        $image1Path = null;
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $filename = time() . '_1_' . $file->getClientOriginalName();
            $destinationPath = public_path('photos/users');
            $file->move($destinationPath, $filename);
            $image1Path = 'photos/users/' . $filename;
        }

        $image2Path = null;
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $filename = time() . '_2_' . $file->getClientOriginalName();
            $destinationPath = public_path('photos/users');
            $file->move($destinationPath, $filename);
            $image2Path = 'photos/users/' . $filename;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'current_address' => $request->current_address,
            'employment_status' => $request->employment_status,
            'monthly_income' => $request->monthly_income,
            'nid' => $request->nid,
            'emergency_contact' => $request->emergency_contact,
            'preferred_move_in_date' => $request->preferred_move_in_date,
            'has_pets' => $request->has_pets,
            'rental_budget' => $request->rental_budget,
            'password' => Hash::make($request->password),
            'image1' => $image1Path,
            'image2' => $image2Path,
        ]);

        $user->sendOtpNotification();

        return redirect()->route('verification.notice');
        // alert_success(__('Registration Successfully Completed'));
        // return redirect()->route('login.page');
    }

    public function loadLogin()
    {
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $userCredential = $request->only('phone_number', 'password');
        if (Auth::attempt($userCredential)) {
            alert_success(__('Login Successfully Completed'));
            return redirect('/');
        } else {
            return back()->with('error', 'Number and Password is incorrect');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        alert_success(__('Logout Successfully Completed'));
        return redirect('/login');
    }
}