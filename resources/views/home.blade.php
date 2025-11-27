@extends('layouts.app')

@section('title', 'Trang Chủ - Công Ty Xây Dựng')

@section('content')
<style>
    .project-card-link {
        text-decoration: none;
        color: inherit;
    }
</style>
    <!-- Hero Section -->
    <section class="hero-section"
        style="background-image: url('{{ $banner ? Voyager::image($banner->image) : asset("images/banner_default.jpg") }}')">
        <div class="container">
            <h1 class="display-4">{{ $banner->title ?? 'Tiêu đề mặc định' }}</h1>
            <p class="lead mb-4">{{ $banner->description ?? 'Mô tả mặc định' }}</p>
            <a href="/du-an" class="btn btn-custom btn-lg">Xem dự án</a>
        </div>
    </section>

    <!-- Về Chúng Tôi Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                     <h2 class="section-title">Về Chúng Tôi</h2>
                    <p class="lead text-muted">Với hơn 10 năm kinh nghiệm trong lĩnh vực xây dựng, chúng tôi tự hào là đối tác tin cậy của hàng trăm gia đình Việt Nam trong việc hiện thực hóa ngôi nhà mơ ước.</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="stats-item">
                        <span class="number">10+</span>
                        <p class="text">Năm kinh nghiệm</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stats-item">
                        <span class="number">140+</span>
                        <p class="text">Công trình đã thi công</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stats-item">
                        <span class="number">99%</span>
                        <p class="text">Khách hàng hài lòng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dịch Vụ Của Chúng Tôi -->
    <section class="py-5 bg-light">
        <div class="container text-center my-3">
            <h2 class="section-title">Dịch Vụ Của Chúng Tôi</h2>
            <div class="row mx-auto my-auto justify-content-center">
            @if($services->isEmpty())
                không có dịch vụ nào
            @else
                <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
                    <div class="carousel-inner" role="listbox">
                        @foreach($services as $index => $service)
                            <a href="{{ route('services.detail', $service->slug) }}"
                                class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="col-md-4">
                                    <div class="service-card" style="background-image: url('{{ $service->image ? Voyager::image($service->image) : asset("images/banner_default.jpg") }}');">
                                        <div class="overlay">
                                            <h4>{{ $service->name ?? 'Tiêu đề mặc định' }}</h4>
                                            <p>{{ Str::words($service->summary, 30, '...')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#serviceCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#serviceCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            @endif
            </div>
        </div>
    </section>

    <!-- Dự Án Đã Hoàn Thành -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title">Dự Án Đã Hoàn Thành</h2>
            <div class="row">
                @if($projects->isEmpty())
                    không có dự án nào
                @else
                    @foreach($projects as $index => $item)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('projects.detail', $item->slug) }}" class="project-card-link">
                                <div class="card project-card h-100">
                                    <img src="{{ $item->image ? Voyager::image($item->image) : asset("images/project_default.jpg") }}" class="card-img-top" alt="Dự án 1" style="max-height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text">Diện tích: {{$item->land_area}} | Hoàn thành: {{$item->year}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
                
            </div>
            <div class="text-center mt-4">
                <a href="{{route('projects.index',['status'=>'hoan-thanh'])}}" class="btn btn-custom btn-lg" >Xem thêm</a>
            </div>
        </div>
    </section>

    <!-- Tại sao chọn chúng tôi -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Tại Sao Chọn Chúng Tôi?</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="why-us-item">
                        <i class="bi bi-shield-check"></i>
                        <h4>Uy Tín Hàng Đầu</h4>
                        <p class="text-muted">Chúng tôi cam kết chất lượng và tiến độ trong từng dự án.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="why-us-item">
                       <i class="bi bi-people-fill"></i>
                        <h4>Đội Ngũ Chuyên Nghiệp</h4>
                        <p class="text-muted">Kiến trúc sư và kỹ sư giàu kinh nghiệm, sáng tạo và tận tâm.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="why-us-item">
                        <i class="bi bi-gem"></i>
                        <h4>Giải Pháp Tối Ưu</h4>
                        <p class="text-muted">Luôn đưa ra các giải pháp thiết kế và thi công hiệu quả nhất.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">Khách Hàng Nói Về Chúng Tôi</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Tôi rất hài lòng với chất lượng thi công và thái độ phục vụ của công ty. Ngôi nhà được hoàn thiện đúng tiến độ, vượt cả mong đợi của gia đình tôi.</p>
                    <div class="customer-info">
                        <div class="customer-avatar">AN</div>
                        <div>
                            <div class="customer-name">Anh Nguyễn Văn An</div>
                            <div class="customer-project">Biệt thự Quận 2</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Đội ngũ tư vấn nhiệt tình, thiết kế đẹp và phù hợp với phong thủy. Giá cả hợp lý, thi công nhanh chóng. Tôi sẽ giới thiệu cho bạn bè và người thân.</p>
                    <div class="customer-info">
                        <div class="customer-avatar">HT</div>
                        <div>
                            <div class="customer-name">Chị Trần Thị Hương</div>
                            <div class="customer-project">Nhà phố Thủ Đức</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Công ty rất chuyên nghiệp từ khâu thiết kế đến thi công. Đội giám sát làm việc cẩn thận, báo cáo tiến độ thường xuyên. Tôi hoàn toàn yên tâm.</p>
                    <div class="customer-info">
                        <div class="customer-avatar">DM</div>
                        <div>
                            <div class="customer-name">Anh Lê Duy Minh</div>
                            <div class="customer-project">Villa Đà Lạt</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
