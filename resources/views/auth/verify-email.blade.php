@extends('layouts.app')

@section('title', 'Xác thực Email')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow text-center" style="width: 400px;">
        <h2 class="mb-3">Xác thực Email</h2>
        <p>Chúng tôi đã gửi email xác thực đến địa chỉ của bạn.</p>
        <p>Vui lòng kiểm tra hộp thư của bạn và nhấp vào liên kết để xác nhận email.</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-warning w-100">Gửi lại email xác thực</button>
        </form>
        <p class="mt-3"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
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