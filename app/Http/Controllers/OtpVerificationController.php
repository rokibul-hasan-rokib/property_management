<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;

class OtpVerificationController extends Controller
{

    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verificationNotice(){
        return view('auth.verification-notice');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

       // $user = User::where('email', $request->email)->first();

        $otp = Otp::where('otp', $request->otp)
                    ->where('is_used', false)
                    ->first();

        if ($otp) {
            $otp->update(['is_used' => true]);
            alert_success(__('Email verified successfully.'));
            return redirect()->route('login')->with('success', 'Email verified successfully.');
        }

        return back()->withErrors(['otp' => 'The provided OTP is invalid or has been used.']);
    }

}