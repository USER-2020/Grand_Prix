<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed",
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return response()->json([
            "status" => true,
            "message" => "User created succesfully",
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json([
                "status" => true,
                "message" => "User logged in successfully",
                "token" => $token,
            ]);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function profile()
    {
        $userData = auth()->user();

        return response()->json([
            "status" => true,
            "messsage" => "Profile data",
            "user" => $userData,
        ]);
    }

    public function refreshToken()
    {
        $newToken = auth()->refresh();
        return response()->json([
            "status" => true,
            "message" => "New access token generate",
            "token" => $newToken,
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            "status" => true,
            "message" => "User Logged out successfully",
        ]);
    }

}
