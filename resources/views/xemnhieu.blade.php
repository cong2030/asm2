@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Tin xem nhiều</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="display-4 text-danger">10 Tin Xem Nhiều Nhất</h1>
        <ul class="list-group">
            @foreach($tinXemNhieu as $tin)
                <li class="list-group-item list-group-item-warning">{{ $tin->title }}</li>
            @endforeach
        </ul>

        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary me-2">Quay lại trang chủ</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
