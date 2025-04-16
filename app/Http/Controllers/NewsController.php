<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        // Lấy tất cả tin, bao gồm cột image
        $tatCaTin = News::orderBy('created_at', 'desc')->get(['id', 'title', 'image', 'category_id', 'created_at']);
        $tinNoiBat = News::orderBy('views', 'desc')->first();
        $tinXemNhieu = News::orderBy('views', 'desc')->take(5)->get(['id', 'title', 'image', 'category_id', 'created_at']);

        return view('home', compact('tatCaTin', 'tinNoiBat', 'tinXemNhieu'));
    }

    public function xemNhieu()
    {
        $tinXemNhieu = News::orderBy('views', 'desc')
            ->take(10)
            ->get(['id', 'title', 'image', 'category_id', 'created_at']);
        return view('xemnhieu', compact('tinXemNhieu'));
    }

    public function tinMoi()
    {
        $tinMoi = News::orderBy('created_at', 'desc')
            ->take(10)
            ->get(['id', 'title', 'image', 'category_id', 'created_at']);
        return view('tinmoi', compact('tinMoi'));
    }

    public function tinTrongLoai($id)
    {
        $tenLoai = Category::where('id', $id)->value('name');
        $tinTrongLoai = News::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'title', 'image', 'category_id', 'created_at']);
        return view('tintrongloai', compact('tinTrongLoai', 'tenLoai'));
    }

    public function chiTietTin($id)
    {
        $tin = News::findOrFail($id);
        $tin->increment('views'); // Tăng lượt xem
        return view('chitiettin', compact('tin'));
    }
}