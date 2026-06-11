<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordOtp;

class UserRepository extends Repository
{
    public static $path = "/users";

    public static function model()
    {
        return User::class;
    }

    // =============================
    // FIND USER BY EMAIL
    // =============================
    public static function findByEmail($email)
    {
        return self::query()
            ->where('email', $email)
            ->first();
    }

    // =============================
    // ACCESS TOKEN (SANCTUM SAFE)
    // =============================
    public static function getAccessToken(User $user)
    {
        $tokenResult = $user->createToken('user token');

        return [
            'auth_type' => 'Bearer',
            'token' => $tokenResult->plainTextToken ?? null,
        ];
    }

    // =============================
    // CREATE USER
    // =============================
    public static function storeByRequest($request)
    {
        return self::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'email_verified_at' => $request->email_verified_at,
            'company_name' => $request->company_name,
            'password' => bcrypt($request->password),
        ]);
    }

    // =============================
    // UPDATE USER (ADMIN PANEL)
    // =============================
    public static function userUpdate(Request $request, User $user)
    {
        self::update($user, [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if ($request->role_name) {
            $user->syncRoles([$request->role_name]);
        }

        if ($request->password) {
            self::update($user, [
                'password' => bcrypt($request->password),
            ]);
        }

        return $user;
    }

    // =============================
    // PROFILE UPDATE
    // =============================
    public static function updateByRequest($request, User $user): User
    {
        $thumbnail = $user->thumbnail;

        if ($request->hasFile('image')) {
            $thumbnail = MediaRepository::updateOrCreateByRequest(
                $request->image,
                self::$path,
                'Image',
                $thumbnail
            );
        }

        self::update($user, [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'thumbnail_id' => $thumbnail ? $thumbnail->id : null,
        ]);

        return $user;
    }

    // =============================
    // CHANGE PASSWORD (LOGGED USER)
    // =============================
    public static function updateByPassword(ChangePasswordRequest $request, User $user): bool
    {
        return self::update($user, [
            'password' => bcrypt($request->password)
        ]);
    }

    // =============================
    // RESET PASSWORD (OTP FLOW)
    // =============================
    public static function resetPassword(ResetPasswordRequest $request, User $user)
    {
        return self::update($user, [
            'password' => bcrypt($request->password),
            'otp' => null,
            'otp_expire_at' => null,
        ]);
    }

    // =============================
    // EMAIL VERIFIED
    // =============================
    public static function emailVerifyAt(User $user)
    {
        return self::update($user, [
            'email_verified_at' => now()
        ]);
    }

    // =============================
    // OTP UPDATE
    // =============================
    public static function updateOtp(User $user, $otp)
    {
        return self::update($user, [
            'otp' => $otp,
            'otp_expire_at' => now()->addMinutes(5),
        ]);
    }

    // =============================
    // CLEAR OTP
    // =============================
    public static function clearOtp(User $user)
    {
        return self::update($user, [
            'otp' => null,
            'otp_expire_at' => null,
        ]);
    }
}
