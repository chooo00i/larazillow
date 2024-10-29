<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // 로그인 페이지 이동
    public function create()
    {
        return inertia('Auth/Login');
    }

    // 로그인
    public function store(Request $request) 
    {
        // 유효성 확인
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Authentication failed'
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended();
    }

    // 로그아웃
    public function destroy()
    {

    }
}
