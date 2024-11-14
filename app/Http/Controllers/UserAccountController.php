<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed' // password_confirmation까지 유효성 검사
        ]));
        // $user->password = Hash::make($user->password); // 라라벨 10부터 생략
        // $user->save();

        // 계정 생성 후 로그인
        Auth::login($user);

        return redirect()->route('listing.index')
            ->with('success', 'Account created!');
    }
}
