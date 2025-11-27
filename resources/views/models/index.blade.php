@extends('layouts.app')

@section('title', 'Mẫu Nhà Đẹp - Công Ty Xây Dựng HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Thư Viện Mẫu Nhà',
    'breadcrumbs' => [
        ['name' => 'Mẫu nhà']
    ]
])

<style>
    .model-card {
        background-color: #fff;
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px S12px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        height: 100%;
    }
    .model-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    }
    .model-card-img {
        height: 250px;
        object-fit: cover;
    }
    .model-card .card-body {
        padding: 25px;
    }
    .model-card .card-title {
        font-weight: 700;
        color: #333;
    }
    .model-card .card-text {
        color: #666;
    }
</style>

<!-- House Models Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Khám Phá Các Mẫu Nhà Ưa Chuộng</h2>
            <p class="text-muted">Từ hiện đại đến cổ điển, chúng tôi mang đến những thiết kế nhà ở đáp ứng mọi nhu cầu và phong cách.</p>
        </div>
        @if($home_types->isEmpty())
            <div>Hiện tại chưa có mẫu nào được cập nhật cả</div>
        @else
            <div class="row">
                @foreach($home_types as $item)
                    <!-- Sample Model 1: -->
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <a href="{{ route('projects.index', ['id'=>$item->id]) }}" class="text-decoration-none w-100">
                        <div class="model-card">
                            <img src="{{ Voyager::image($item->image) }}" class="model-card-img" alt="{{ $item->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->summary }}</p>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
        @endif

       
    </div>
</section>

@endsection
