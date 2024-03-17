<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register()
    {
        return view("Auth.register");
    }

    public function Register_(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => ['required', 'regex: "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"'],
            'password_confrim' => 'required|same:password',
            'email' => 'required|unique:users|regex:/(.*)@(gmail)\.com+$/i',
        ], [
                'name.required' => 'Vui lòng  nhập tên  người  dùng !',
                'password.required' => 'Vui lòng nhập mật khẩu !',
                'password.regex' => 'Tối thiểu 8 ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số !',
                'password_confrim.same' => 'Mật khẩu xác nhận không đúng !',
                'password_confrim.required' => 'Vui lòng xác nhận lại mật khẩu !',
                'email.required' => 'Vui lòng  nhập  email !',
                'email.unique' => 'Email đã được đăng ký !',
                'email.regex' => 'Định dạng email không dúng vui  lòng  nhập  lại !',
            ]);
            
        $users = new User([
            'name' => $request->name,
            'password' => hash::make($request->password),
            'email' => $request->email,
        ]);
        $users->save();

        return redirect()->route('register')->with('thongbao','Đăng ký thành công');
    }
}