<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileShow()
    {
        return view('Auth/profileShow')->with('user', auth()->user());
    }

    public function profileEdit($id, Request $request)
    {
        $request->validate([
            'tel' => 'digits_between:9,10',
        ], [
            'tel.digits_between' => 'Định dạng số điện thoại không đúng!',
        ]);

        $user = user::find($id);

        $user->name = $request->input('name');
        $user->tel = $request->input('tel');
        $user->city = $request->input('city');
        $user->district = $request->input('district') ?? $user->district;
        $user->ward = $request->input('ward') ?? $user->ward;
        $user->address = $request->input('address') ?? $user->address;
        $user->update();
        return redirect()->route('profile')->with('success', 'Cập  nhập  thành  công  !!');

    }


    public function changePassword()
    {
        return view('Auth.changePassword');
    }

    public function changePasswordUpdate(Request $request)
    {
        $request->validate([
            'new_password' => ['required', 'regex: "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"'],
            'password_confrim' => 'required|same:new_password',
        ], [
            'new_password.required' => 'Vui lòng nhập mật khẩu !',
            'new_password.regex' => 'Tối thiểu 8 ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số !',
            'password_confrim.same' => 'Mật khẩu xác nhận không đúng !',
            'password_confrim.required' => 'Vui lòng xác nhận lại mật khẩu !',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
