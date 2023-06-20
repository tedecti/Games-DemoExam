<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $data = $request->validate([
            "username" => ["required", "unique:users,username", "min:4", "max:60"],
            "password" => ["required", "min:8"],
        ]);
        $data['last_login'] = now();
        $data['password'] = bcrypt($data['password']);
        $data['last_login'] = now();
        $user = User::create($data);
        $token = $user->createToken("")->plainTextToken;
        return response([
            "status" => "success",
            "token" => $token,
            "username" => $data['username'],
        ]);
    }

    public function signin(Request $request)
    {
        $data = $request->validate([
            "username" => ["required", "unique:users,username", "min:4", "max:60"],
            "password" => ["required", "min:8"],
        ]);
        $data['last_login'] = now();
        $user = User::where('username', $data['username'])->first();
        if (!Hash::check($data["password"], $user->password)) return response(['status' => 'invalid', 'message' => 'Wrong password'], 401);
        if ($user->tokens()->count()) {
            return response([
                "status" => "invalid",
                "message" => "Please, leave from other device"
            ], 401);
        }
        $token = $user->createToken("")->plainTextToken;
        return response([
            "status" => "success",
            "token" => $token,
            "username" => $data['username'],
        ], 200);
    }

    public function signout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            "status" => "success"
        ], 200);
    }
}