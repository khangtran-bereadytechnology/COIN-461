<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup');
    }
    public function signUp(Request $request)
    {
        //kiểm tra dữ liệu
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        //taọ người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //đăng nhập người dùng (xác thực) trong ứng dụng
        Auth::login($user);

        //chuyển hướng trang
        return Redirect::to('/');
    }

    public function showSigninForm()
    {
        return view('auth.signin');
    }
    public function signIn(Request $request)
    {
        //kiểm tra dữ liệu
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //kiểm tra thông tin đăng nhập
        //xác thực thành công
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Redirect::to('/');
        }
        //xác thực thất bại  
        return back()->withErrors(['auth' => 'Thông tin đăng nhập không hợp lệ']);
    }

    public function signOut(Request $request)
    {
        //đăng xuất trong ứng dụng
        Auth::logout();

        // khai báo session hết hạn
        $request->session()->invalidate();

        // tạo dữ session mới, dồng thời xóa session cũ
        $request->session()->regenerateToken();

        //chuyển hướng về trang chủ
        return redirect('/');
    }
}
