@extends('layouts.app')

@section('title', 'Dịch Vụ - Công Ty Xây Dựng HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Dịch Vụ Của Chúng Tôi',
    'breadcrumbs' => [
        ['name' => 'Dịch vụ']
    ]
])

<style>
    .service-overview-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        height: 100%;
    }
    .service-overview-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }
    .service-overview-card .card-img-top {
        height: 220px;
        object-fit: cover;
    }
    .pagination {
        justify-content: center;
    }
</style>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Các Lĩnh Vực Hoạt Động Chính</h2>
        <div class="row">
            @forelse ($services as $service)
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="service-overview-card">
                        <img src="{{ $service ? Voyager::image($service->image) : asset("images/service_default.jpg") }}" class="card-img-top" alt="{{ $service->name }}">
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ Str::words($service->summary, 50, '...')}}</p>
                            <a href="{{ route('services.detail', $service->slug)}}" class="btn btn-primary mt-3 align-self-start">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Hiện chưa có dịch vụ nào.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $services->links() }}
        </div>
    </div>
</section>

@endsection
