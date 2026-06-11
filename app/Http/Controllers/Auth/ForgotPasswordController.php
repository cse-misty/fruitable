<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordOtp;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = UserRepository::findByEmail($request->email);

    if (!$user) {
        return back()->withErrors([
            'email' => 'Sorry, no user found with this email'
        ]);
    }

    $otp = rand(100000, 999999);

    $user->otp = $otp;
    $user->otp_expire_at = now()->addMinutes(5);
    $user->save();

    try {
        Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your OTP Code');
        });
    } catch (\Exception $e) {
        return back()->withErrors([
            'email' => 'Failed to send OTP. Please try again later.'
        ]);
    }

    // 🔥 SESSION CONTROL (IMPORTANT FOR MODAL STEPS)
    session([
        'admin_password_reset_email' => $user->email,
        'admin_password_reset_verified' => false
    ]);

    return back()->with('success', 'OTP sent successfully!');
}

public function resendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = UserRepository::findByEmail($request->email);

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'User not found'
        ]);
    }

    $otp = rand(100000, 999999);

    $user->otp = $otp;
    $user->otp_expire_at = now()->addMinutes(5);
    $user->save();

    try {
        Mail::raw("Your new OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Resent OTP Code');
        });
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Email sending failed'
        ]);
    }

    return response()->json([
        'status' => true,
        'message' => 'New OTP sent successfully!'
    ]);
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required'
    ]);

    $user = UserRepository::findByEmail($request->email);

    if (!$user) {
        return back()->withErrors([
            'email' => 'User not found'
        ]);
    }

    // expired check
    if (now()->gt($user->otp_expire_at)) {
        return back()->withErrors([
            'otp' => 'OTP expired. Please request again.'
        ]);
    }

    // match check
    if ($user->otp != $request->otp) {
        return back()->withErrors([
            'otp' => 'Invalid OTP'
        ]);
    }

    // clear OTP
    $user->otp = null;
    $user->otp_expire_at = null;
    $user->save();

    session([
        'admin_password_reset_email' => $user->email,
        'admin_password_reset_verified' => true
    ]);

    return back()->with('success', 'OTP verified successfully!');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:6|confirmed'
    ]);

    $email = session('admin_password_reset_email');

    $user = UserRepository::findByEmail($email);

    if (!$user) {
        return back()->withErrors([
            'email' => 'User not found'
        ]);
    }

    $user->password = bcrypt($request->password);
    $user->otp = null;
    $user->otp_expire_at = null;
    $user->save();

    // clear session (VERY IMPORTANT)
    session()->forget([
        'admin_password_reset_email',
        'admin_password_reset_verified'
    ]);

    return redirect()->route('login')
        ->with('success', 'Password reset successful');
}
}
