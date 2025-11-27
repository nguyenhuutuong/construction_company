@extends('layouts.app')

@section('title', 'Về Chúng Tôi - Công Ty Xây Dựng HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Về Chúng Tôi',
    'breadcrumbs' => [
        ['name' => 'Giới thiệu']
    ]
])

<style>
    .section-title-underline {
        font-weight: 700;
        color: #B85042;
        position: relative;
        padding-bottom: 15px;
        display: inline-block;
    }
    .section-title-underline::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: #B85042;
    }
    .vision-mission-card {
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .vision-mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,.1);
    }
    .vision-mission-card i {
        font-size: 3.5rem;
        color: #B85042;
        margin-bottom: 20px;
    }
    .achievement-card {
        background-color: #B85042;
        color: white;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
    }
    .achievement-card i {
        font-size: 3rem;
    }
    .achievement-card h3 {
        font-weight: 700;
    }
    .feature-item i {
        font-size: 2.5rem;
        color: #B85042;
    }
</style>

<!-- Giới thiệu chung -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=2070&auto=format&fit=crop" alt="Đội ngũ HTcons" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title-underline mb-4">Câu chuyện về HTcons</h2>
                <p class="text-muted">Được thành lập từ năm 2018, Công ty Cổ phần Đầu tư và Xây dựng H&T (HTcons) luôn mong muốn mang đến cho khách hàng những trải nghiệm và dịch vụ chất lượng, mang giá trị sáng tạo khác biệt. Với bề dày hơn 15 năm kinh nghiệm, HTcons đã trở thành một trong những công ty hàng đầu trong lĩnh vực tư vấn thiết kế, thi công kiến trúc – nội thất.</p>
                <p class="text-muted">Đối với chúng tôi, mỗi công trình là một tác phẩm được đúc kết từ tâm hồn, nhiệt huyết và kinh nghiệm của tập thể cán bộ, kiến trúc sư, kỹ sư và công nhân của công ty.</p>
                <p class="text-muted">Trong xu thế hội nhập, HTcons luôn tự hào khi hoàn toàn có thể mang lại cho khách hàng những tác phẩm nghệ thuật hoàn hảo nhất, đáp ứng các yêu cầu ngày càng cao về chất lượng, tiến độ và hiệu quả đầu tư.</p>
            </div>
        </div>
    </div>
</section>

<!-- Thành tựu -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="achievement-card">
                    <i class="bi bi-trophy-fill mb-3"></i>
                    <h3>Thành Tựu Nổi Bật</h3>
                    <p class="lead mb-0">TOP 10 công ty thiết kế và thi công kiến trúc nội thất uy tín hàng đầu Asean 2025</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tầm nhìn & Sứ mệnh -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center mb-5">Tầm nhìn và Sứ mệnh</h2>
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="vision-mission-card h-100">
                    <i class="bi bi-binoculars-fill"></i>
                    <h3>Tầm Nhìn</h3>
                    <p>Trở thành công ty hàng đầu trong lĩnh vực thiết kế và thi công các công trình dân dụng và công nghiệp.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision-mission-card h-100">
                    <i class="bi bi-bullseye"></i>
                    <h3>Sứ Mệnh</h3>
                    <p>Cung cấp hệ thống dịch vụ đồng bộ, khép kín với chất lượng chuyên nghiệp nhất và không ngừng đổi mới sáng tạo để mang đến sản phẩm, dịch vụ tốt nhất.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Giá trị cốt lõi -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Giá Trị Cốt Lõi</h2>
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="vision-mission-card h-100">
                    <i class="bi bi-gem"></i>
                    <h3>Lương Tâm</h3>
                    <p>Làm nghề bằng tất cả sự tận tâm. Sự hài lòng của khách hàng và chất lượng công trình là mục tiêu hàng đầu.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision-mission-card h-100">
                    <i class="bi bi-book-half"></i>
                    <h3>Tri Thức</h3>
                    <p>Nguồn nhân lực trí tuệ cao, sáng tạo, giàu kinh nghiệm từ các tập đoàn lớn là nền móng vững chắc của công ty.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Dịch vụ -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center mb-5">Dịch Vụ Của Chúng Tôi</h2>
        <div class="row text-center">
            <div class="col-lg-4 mb-4">
                <div class="feature-item">
                    <i class="bi bi-house-gear-fill mb-3"></i>
                    <h4>Cải tạo sửa chữa nhà</h4>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-item">
                    <i class="bi bi-palette-fill mb-3"></i>
                    <h4>Tư vấn thiết kế kiến trúc, nội thất</h4>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-item">
                    <i class="bi bi-tools mb-3"></i>
                    <h4>Thi công xây dựng nội ngoại thất</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sự khác biệt -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Sự Khác Biệt Của HTcons</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                <i class="bi bi-camera-video-fill fs-2 text-primary me-3"></i>
                <div>
                    <h5>Giám sát trực tiếp</h5>
                    <p class="text-muted">Hệ thống camera giám sát chia sẻ trực tiếp với chủ nhà, khẳng định sự minh bạch và chất lượng.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                <i class="bi bi-clock-history fs-2 text-primary me-3"></i>
                <div>
                    <h5>Đảm bảo tiến độ</h5>
                    <p class="text-muted">Luôn đảm bảo đúng tiến độ xây dựng công trình theo như đã được thỏa thuận.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                <i class="bi bi-check-circle-fill fs-2 text-primary me-3"></i>
                <div>
                    <h5>Yêu cầu kỹ thuật</h5>
                    <p class="text-muted">Chất lượng công trình cũng như tính thẩm mỹ của ngôi nhà là ưu tiên hàng đầu.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                <i class="bi bi-piggy-bank-fill fs-2 text-primary me-3"></i>
                <div>
                    <h5>Không phát sinh chi phí</h5>
                    <p class="text-muted">Dự toán thi công chi tiết nhằm tránh phát sinh chi phí trong quá trình thi công.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                <i class="bi bi-headset fs-2 text-primary me-3"></i>
                <div>
                    <h5>Hỗ trợ tư vấn</h5>
                    <p class="text-muted">Luôn sẵn sàng tư vấn và đưa ra những giải pháp tối ưu nhất cho tổ ấm của bạn.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-white text-center" style="background-color: #B85042;">
    <div class="container">
        <h2 class="fw-bold">Hãy Liên Hệ Với Chúng Tôi Ngay!</h2>
        <p class="lead mb-4">Để được tư vấn đưa ra những giải pháp tối ưu nhất cho tổ ấm của bạn!</p>
        <a href="{{ url('/lien-he') }}" class="btn btn-light btn-lg fw-bold">Bắt đầu ngay</a>
    </div>
</section>

@endsection
