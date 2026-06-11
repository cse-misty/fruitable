<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use App\Models\PasswordOtp;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // SAME PAGE এ থাকবে
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function showCart()
    {

        if (!auth()->check()) {
            return redirect()->back()->with('open_login', true)->with('error', 'Please login first.');
        }

        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function showCheckout()
    {

        if (!auth()->check()) {
            return redirect()->back()->with('open_login', true)->with('error', 'Please login first.');
        }


    }




   public function sendOtp(Request $request)
    {
        dd($request->all());
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return response()->json([
                'message' => 'Email not found!'
            ], 404);
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Delete old OTP
        PasswordOtp::where('email', $request->email)->delete();

        // Save new OTP
        PasswordOtp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(2)
        ]);

        // Send Mail
        Mail::raw("Your OTP Code is: {$otp}", function ($message) use ($request) {

            $message->to($request->email)
                    ->subject('Password Reset OTP');
        });

        return response()->json([
            'message' => 'OTP sent successfully.'
        ]);
    }




    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $otpData = PasswordOtp::where('email', $request->email)
                    ->where('otp', $request->otp)
                    ->first();

        if (!$otpData) {

            return response()->json([
                'message' => 'Invalid OTP!'
            ], 422);
        }

        // Expired check
        if (now()->greaterThan($otpData->expires_at)) {

            return response()->json([
                'message' => 'OTP expired!'
            ], 422);
        }

        return response()->json([
            'message' => 'OTP verified successfully.'
        ]);
    }




    public function resetPassword(Request $request)
    {
        $request->validate([

            'email' => 'required|email',

            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return response()->json([
                'message' => 'User not found!'
            ], 404);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // Delete OTP
        PasswordOtp::where('email', $request->email)->delete();

        return response()->json([
            'message' => 'Password reset successful.'
        ]);
    }

        public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('index');
        }



}
