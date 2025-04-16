@extends('layouts.app')

@section('title', $tin->title) <!-- Sửa tiêu đề trang cho phù hợp -->

@section('content')
<style>
    /* CSS tùy chỉnh để làm giao diện chi tiết tin chuyên nghiệp */
    .news-detail {
        background: #fff;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    .news-detail img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }
    .news-detail .category {
        font-size: 0.9rem;
        color: #007bff;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }
    .news-detail .meta-info {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 1rem;
    }
    .news-detail .content {
        line-height: 1.8;
        color: #333;
    }
    .news-detail .btn {
        transition: background 0.2s;
    }
</style>

<div class="container mt-4 mb-5">
    <div class="news-detail">
        <!-- Danh mục -->
        <div class="category">
            {{ \App\Models\Category::find($tin->category_id)->name ?? 'Không xác định' }}
        </div>

        <!-- Tiêu đề -->
        <h1 class="display-5 mb-3" style="font-weight: 600; color: #333;">{{ $tin->title }}</h1>

        <!-- Thông tin bổ sung: thời gian và lượt xem -->
        <div class="meta-info">
            <span>Đăng vào: {{ \Carbon\Carbon::parse($tin->created_at)->diffForHumans() }}</span> | 
            <span>Lượt xem: {{ $tin->views }}</span>
        </div>

        <!-- Ảnh bài viết -->
        @if($tin->image)
            <img src="{{ Str::startsWith($tin->image, ['http://', 'https://']) ? $tin->image : asset('storage/' . $tin->image) }}" alt="Ảnh bài viết">
        @else
            <img src="https://via.placeholder.com/800x400?text=Không+có+ảnh" alt="Ảnh bài viết">
        @endif

        <!-- Nội dung bài viết -->
        <div class="content">
            <p>{{ $tin->content }}</p>
        </div>

        <!-- Nút điều hướng -->
        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn btn-primary me-2">Quay lại trang chủ</a>
            <a href="{{ route('tintrongloai', $tin->category_id) }}" class="btn btn-secondary">Danh sách tin cùng loại</a>
        </div>
    </div>
</div>
@endsection