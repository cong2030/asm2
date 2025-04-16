@extends('layouts.app')

@section('title', 'Trang quản trị')

@section('content')
<style>
    .admin-dashboard {
        background: #fff;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-top: 2rem;
    }
    .admin-dashboard h1 {
        font-weight: 700;
        color: #333;
        margin-bottom: 1.5rem;
    }
    .admin-card {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: transform 0.2s;
    }
    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .admin-card h4 {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }
    .admin-card p {
        color: #666;
    }
</style>

<div class="container">
    <div class="admin-dashboard">
        <h1>Trang quản trị</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="admin-card">
                    <h4>Quản lý tin tức</h4>
                    <p>Xem, thêm, sửa, xóa các bài viết tin tức.</p>
                    <a href="{{ route('admin.news') }}" class="btn btn-primary">Quản lý</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-card">
                    <h4>Quản lý danh mục</h4>
                    <p>Quản lý các danh mục tin tức.</p>
                    <a href="{{ route('admin.categories') }}" class="btn btn-primary">Quản lý</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-card">
                    <h4>Quản lý người dùng</h4>
                    <p>Xem và quản lý danh sách người dùng.</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">Quản lý</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection