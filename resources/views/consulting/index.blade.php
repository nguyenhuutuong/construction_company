@extends('layouts.app')

@section('title', 'Tư Vấn Xây Dựng - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Dịch Vụ Tư Vấn',
    'breadcrumbs' => [
        ['name' => 'Tư vấn']
    ]
])

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Hỗ Trợ Toàn Diện Cho Ngôi Nhà Của Bạn</h2>
            <p class="text-muted">Từ quy trình, pháp lý đến phong thủy, chúng tôi luôn sẵn sàng đồng hành.</p>
        </div>

        <div class="row">
            @if($MenuConsulting->isEmpty())
                <li>không có danh mục tu vấn nào</li>
            @else
                @foreach($MenuConsulting as $item)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{{$item->summary}}</p>
                            <a href="{{ route('consulting.detail', $item->slug) }}" class="btn btn-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            
        </div>

    </div>
</section>

@endsection
