@extends('layouts.app')

@section('title', 'Sửa người dùng')

@section('styles')
<style>
    .admin-wrapper {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        color: #ecf0f1;
        padding-top: 20px;
        position: fixed;
        height: 100%;
        overflow-y: auto;
    }

    .sidebar .sidebar-brand {
        font-size: 1.5rem;
        font-weight: 700;
        padding: 1rem;
        text-align: center;
        color: #fff;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        color: #ecf0f1;
        transition: background-color 0.3s;
    }

    .sidebar .nav-link:hover {
        background-color: #34495e;
        color: #fff;
    }

    .sidebar .nav-link.active {
        background-color: #3498db;
        color: #fff;
    }

    .sidebar .nav-link i {
        margin-right: 0.5rem;
    }

    .main-content {
        margin-left: 250px;
        flex: 1;
        padding: 2rem;
        background-color: #f5f6fa;
    }

    .content-header h1 {
        font-weight: 700;
        color: #333;
    }
</style>
@endsection

@section('content')
<div class="admin-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <div class="content-header">
            <h1>Sửa người dùng</h1>
        </div>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Vai trò</label>
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                    <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>User</option>
                    <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection