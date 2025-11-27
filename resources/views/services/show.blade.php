@extends('layouts.app')

@section('title', 'Thiết Kế & Thi Công Nội Thất - HTcons')

@section('content')
<style>
    .col-lg-8 img {
        max-width: 80% !important;
        height: auto !important;
        display: block;
        margin: 0 auto;
    }
</style>
<!-- Service Detail Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {!! $service->content !!}
            </div>
            <div class="col-lg-4">
                <div class="card sticky-top" style="top: 100px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Các Dịch Vụ Khác</h5>
                        <ul class="list-group list-group-flush">
                        @if($MenuServices->isEmpty())
                            <li>không có dịch vụ nào</li>
                        @else
                            <a href="{{ route('services.detail', 'all') }}" class="list-group-item list-group-item-action">Tất Cả Dịch Vụ</a>
                            @foreach($MenuServices as $item)
                                <a href="{{ route('services.detail', $item->slug) }}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
