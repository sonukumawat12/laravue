<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { 
            $user = Auth::user();
            // $token = $user->createToken('authToken')->plainTextToken; // Generate token using createToken

            return response()->json([
                'status' => 200,
                'message' => 'Logged in successfully',
                'user' => $user,
                // 'token' => $token // Return generated token
            ], 200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials'
            ], 401);
        }
    }
}
