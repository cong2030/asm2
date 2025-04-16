<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log; 

class AuthController extends Controller {
    // Hiển thị trang đăng ký
    public function showRegister() {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request) {
        // Debug dữ liệu gửi từ form
        Log::info('Dữ liệu gửi từ form:', $request->all());

        // Thực hiện validation
        try {
            $validated = $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);
            Log::info('Dữ liệu sau validation:', $validated);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', $e->errors());
            throw $e; // Ném lại lỗi để Laravel xử lý và hiển thị trên form
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Log::info('User vừa tạo:', $user->toArray());

        // Gửi email xác thực
        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng kiểm tra email để xác thực.');
    }

    // Hiển thị trang đăng nhập
    public function showLogin() {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'Tài khoản không tồn tại!']);
        }
    
        // Kiểm tra mật khẩu bằng Hash::check()
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Mật khẩu không chính xác!']);
        }
    
        Auth::login($user);
    
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }

    // Xử lý đăng xuất
    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất.');
    }
}