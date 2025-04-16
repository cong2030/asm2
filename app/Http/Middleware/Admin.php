<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return view('admin.dashboard');
        }
        return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập trang quản trị! Vai trò của bạn: ' . (Auth::user()->role == 0 ? 'User' : 'Không xác định'));
    }
}