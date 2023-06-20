<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users', compact('users'));
    }

    public function show(string $username)
    {
        $user = User::where("username", $username)->first();
        if (!$user){
            return back();
        }
        return view('admin.user', compact('user'));
    }

    public function ban(Request $request, string $username)
    {
        $user = User::where("username", $username)->first();
        if (!$user){
            return back();
        }
        $data = $request->validate([
            "ban_reason"=>["required"]
        ]);
        $user->ban_reason = $data['ban_reason'];
        $user->save();
        return back();
    }
}
