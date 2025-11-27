@extends('layouts.app')

@section('title', 'Trang Chủ - Công Ty Xây Dựng')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4">Kiến Tạo Không Gian, Xây Dựng Ước Mơ</h1>
            <p class="lead mb-4">Chuyên nghiệp - Uy tín - Chất lượng hàng đầu</p>
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
                <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-4">
                                <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1572120360610-d971b9d7767c?q=80&w=2070&auto=format&fit=crop');">
                                    <div class="overlay">
                                        <h4>Xây Nhà Trọn Gói</h4>
                                        <p>Giải pháp xây dựng toàn diện từ thiết kế đến hoàn thiện.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1618220179428-22790b461013?q=80&w=2127&auto=format&fit=crop');">
                                    <div class="overlay">
                                        <h4>Thiết Kế Nội Thất</h4>
                                        <p>Tạo nên không gian sống sang trọng, hiện đại và tối ưu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                 <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=2158&auto=format&fit=crop');">
                                    <div class="overlay">
                                        <h4>Thi Công Ngoại Thất</h4>
                                        <p>Vẻ đẹp hài hòa với kiến trúc tổng thể và môi trường.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1505691938895-1758d7FEB5a1?q=80&w=2070&auto=format&fit=crop');">
                                    <div class="overlay">
                                        <h4>Sửa Chữa & Cải Tạo</h4>
                                        <p>Mang lại diện mạo mới cho ngôi nhà của bạn.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=2074&auto=format&fit=crop');">
                                    <div class="overlay">
                                        <h4>Tư Vấn & Thiết Kế</h4>
                                        <p>Giải pháp tối ưu về công năng và chi phí cho khách hàng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="carousel-item">
                            <div class="col-md-4">
                                 <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a67767e5c?q=80&w=2070&auto=format&fit=crop');">
                                    <div class="overlay">
                                        <h4>Xây Dựng Biệt Thự</h4>
                                        <p>Đẳng cấp, sang trọng và khác biệt trong từng công trình.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#serviceCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#serviceCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Dự Án Đã Hoàn Thành -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title">Dự Án Đã Hoàn Thành</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1974&auto=format&fit=crop" class="card-img-top" alt="Dự án 1">
                        <div class="card-body">
                            <h5 class="card-title">Biệt Thự Vinhomes Central Park</h5>
                            <p class="card-text">Diện tích: 300m² | Hoàn thành: 2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" class="card-img-top" alt="Dự án 2">
                        <div class="card-body">
                            <h5 class="card-title">Nhà Phố Thủ Đức</h5>
                            <p class="card-text">Diện tích: 120m² | Hoàn thành: 2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100">
                        <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=2070&auto=format&fit=crop" class="card-img-top" alt="Dự án 3">
                        <div class="card-body">
                            <h5 class="card-title">Villa Đà Lạt</h5>
                            <p class="card-text">Diện tích: 500m² | Hoàn thành: 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto=format&fit=crop" class="card-img-top" alt="Dự án 4">
                        <div class="card-body">
                            <h5 class="card-title">Căn Hộ Penthouse Quận 2</h5>
                            <p class="card-text">Diện tích: 250m² | Hoàn thành: 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=2070&auto=format&fit=crop" class="card-img-top" alt="Dự án 5">
                        <div class="card-body">
                            <h5 class="card-title">Nhà Phố Quận 7</h5>
                            <p class="card-text">Diện tích: 150m² | Hoàn thành: 2022</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100">
                        <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?q=80&w=2070&auto=format&fit=crop" class="card-img-top" alt="Dự án 6">
                        <div class="card-body">
                            <h5 class="card-title">Biệt Thự Vườn Thủ Đức</h5>
                            <p class="card-text">Diện tích: 400m² | Hoàn thành: 2022</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="/du-an" class="btn btn-custom btn-lg" >Xem thêm</a>
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
