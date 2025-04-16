@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 400px;">
        <h2 class="text-center mb-3">Đăng nhập</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="pass" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
            </div>
            <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
        </form>
        {{-- <p class="text-center mt-3"><a href="{{ route('password.request') }}">Quên mật khẩu?</a></p> --}}
        <p class="text-center">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
    </div>
</div>
@endsection

<style>
    body {
    background-color: #f8f9fa;
}
.card {
    border-radius: 10px;
}
.btn {
    border-radius: 5px;
}

</style>