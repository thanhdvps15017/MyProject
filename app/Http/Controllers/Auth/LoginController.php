<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function Login()
    {
        return view("Auth.login");
    }

    public function Login_(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required'],
        ], [
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ]);
        Hash::make($request->password);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('succes', 'Đăng nhập  thành  công');
        } else {
            return redirect()->route('login')->with('succes', 'Tài khoản hoặc  mật khẩu  không  đúng');
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}