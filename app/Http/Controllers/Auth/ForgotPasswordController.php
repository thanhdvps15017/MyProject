<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('Auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ], [
            'email.required' => 'Vui lòng  nhập  email  quên  mật  khẩu!',
            'email.email' => 'Định  dạng  không  đúng, vui lòng  nhập  lại!',
            'email.exists' => 'Email không tồn tại!',
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('Email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Vui lòng kiểm tra email của bạn!');
    }

    public function showResetPasswordForm($token)
    {
        $data = ['token' => $token];
        return view('Auth.forgetPasswordUpdate', $data);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => ['required', 'string', 'regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"'],
            'password_confirmation' => 'required|same:password'
        ], [
            'email.required' => 'Vui lòng  nhập  email  quên  mật  khẩu!',
            'email.email' => 'Định  dạng  không  đúng, vui lòng  nhập  lại!',
            'email.exists' => 'Email không tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.regex' => 'Tối thiểu 8 ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số !',
            'password_confirmation.same' => 'Mật khẩu xác nhận không đúng!',
            'password_confirmation.required' => 'Vui lòng xác nhận lại mật khẩu !',
        ]);
        
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        
        return redirect('/login')->with('message', 'Your password has been changed!');
    }


}
