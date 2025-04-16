@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Giới Thiệu Về Chúng Tôi</h1>

    <!-- Phần giới thiệu chung -->
    <div class="card p-4 mb-4">
        <h2>Chào mừng bạn đến với trang của chúng tôi!</h2>
        <p>
            Chúng tôi là một nền tảng tin tức cung cấp những thông tin mới nhất và chính xác nhất về nhiều lĩnh vực khác nhau như công nghệ, thể thao, giải trí, kinh tế và nhiều hơn nữa.
            Với đội ngũ biên tập viên chuyên nghiệp, chúng tôi cam kết mang đến cho độc giả những nội dung chất lượng cao.
        </p>
    </div>

    <!-- Sứ mệnh & Tầm nhìn -->
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4 mb-4 bg-light">
                <h3>Sứ mệnh của chúng tôi</h3>
                <p>
                    Sứ mệnh của chúng tôi là cung cấp thông tin đáng tin cậy, nhanh chóng và khách quan đến cộng đồng, giúp mọi người nắm bắt thông tin một cách chính xác và có giá trị.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4 mb-4 bg-light">
                <h3>Tầm nhìn</h3>
                <p>
                    Chúng tôi hướng tới việc trở thành một trong những nền tảng tin tức hàng đầu, nơi mà mọi người có thể tìm kiếm và cập nhật tin tức một cách dễ dàng và hiệu quả.
                </p>
            </div>
        </div>
    </div>

    <!-- Đội ngũ -->
    <div class="card p-4 mb-4">
        <h3>Đội ngũ của chúng tôi</h3>
        <p>
            Chúng tôi tự hào có một đội ngũ phóng viên, biên tập viên và nhà phân tích giàu kinh nghiệm, luôn sẵn sàng cung cấp những tin tức chính xác và hữu ích nhất.
        </p>
        <ul>
            <li><strong>Nguyễn Văn A</strong> - Tổng biên tập</li>
            <li><strong>Trần Thị B</strong> - Biên tập viên mảng công nghệ</li>
            <li><strong>Phạm Văn C</strong> - Biên tập viên mảng thể thao</li>
        </ul>
    </div>

    <!-- Liên hệ -->
    <div class="card p-4">
        <h3>Liên hệ với chúng tôi</h3>
        <p>Nếu bạn có bất kỳ câu hỏi hoặc góp ý nào, hãy liên hệ với chúng tôi qua:</p>
        <ul>
            <li>Email: <a href="mailto:gtv03394@gmail.com">gtv03394@gmail.com</a></li>
            <li>Điện thoại: 0123 456 789</li>
            <li>Địa chỉ: 123 Đường ABC, Quận X, Thành phố Y</li>
        </ul>
    </div>
</div>
@endsection
