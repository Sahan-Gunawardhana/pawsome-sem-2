<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['message' => 'Invalid login credenatials'], 401);
        }

        /** @var \App\Models\UserModel */
        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;
        // $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successfull',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
