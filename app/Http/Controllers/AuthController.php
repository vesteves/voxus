<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('me');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (!Auth::user()->email_verified_at) {
                abort(403, trans('auth.email.email_not_verified'));
            }

            if (!Auth::user()->name) {
                abort(400, trans('auth.messages.missing_fields'));
            }
            // Authentication passed...
            $token = Auth::user()->createToken('Token')->accessToken;

            return response()->json([
                'message' => trans('auth.messages.login_success'),
                'token' => "Bearer " . $token,
                'user' => Auth::user()
            ]);
        } else {
            abort(401, trans('auth.messages.login_credentials_fail'));
        }

        abort(500, trans('auth.messages.login_not_possible'));
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
