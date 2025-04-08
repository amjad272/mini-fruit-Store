<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255 ',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            // If user is created successfully, generate a token
            $token = $user->createToken($user->name . 'auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token_type' => 'Bearer',
                'token' => $token
            ], 201);

        } else {
            // If user creation fails, return an error response
            return response()->json([
                'message' => 'User registration failed'
            ], 500);
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        $token = $user->createToken($user->name . 'auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'token_type' => 'Bearer',
            'token' => $token
        ], 200);

    }
}
