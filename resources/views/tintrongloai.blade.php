@extends('layouts.app')

@section('title', 'Tin trong loại: ' . $tenLoai) <!-- Sửa tiêu đề trang cho phù hợp -->

@section('content')
<style>
    /* CSS tùy chỉnh để làm giao diện chuyên nghiệp */
    .news-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        margin-bottom: 1.5rem;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .news-card img {
        object-fit: cover;
        height: 200px;
        width: 100%;
    }
    .news-card .card-body {
        padding: 1rem;
    }
    .news-card .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .news-card .card-text {
        color: #666;
        font-size: 0.9rem;
    }
    .news-card .category {
        font-size: 0.8rem;
        color: #007bff;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }
</style>

<div class="container mt-4 mb-5">
    <!-- Tiêu đề -->
    <h1 class="display-4 mb-5" style="font-weight: 700; color: #333;">Tin trong loại: {{ $tenLoai }}</h1>

    <!-- Danh sách tin -->
    <div class="row">
        @forelse($tinTrongLoai as $tin)
            <div class="col-md-4">
                <div class="news-card">
                    <a href="{{ route('tin', $tin->id) }}">
                        @if($tin->image)
                            <img src="{{ Str::startsWith($tin->image, ['http://', 'https://']) ? $tin->image : asset('storage/' . $tin->image) }}" alt="Ảnh tin tức">
                        @else
                            <img src="https://via.placeholder.com/400x200?text=Không+có+ảnh" alt="Ảnh tin tức">
                        @endif
                    </a>
                    <div class="card-body">
                        <div class="category">
                            {{ \App\Models\Category::find($tin->category_id)->name ?? 'Không xác định' }}
                        </div>
                        <h5 class="card-title">
                            <a href="{{ route('tin', $tin->id) }}" class="text-decoration-none text-dark">
                                {{ $tin->title }}
                            </a>
                        </h5>
                        <p class="card-text">{{ \Carbon\Carbon::parse($tin->created_at)->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">Không có tin nào trong loại này.</p>
            </div>
        @endforelse
    </div>

    <!-- Nút quay lại -->
    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
</div>
@endsection