@extends('layouts.app')

@section('title', 'Liên hệ - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Liên Hệ Với Chúng Tôi',
    'breadcrumbs' => [
        ['name' => 'Liên hệ']
    ]
])

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="card-title mb-4">Thông tin liên hệ</h3>
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-3">
                                        <i class="fas fa-map-marker-alt fa-2x me-3 text-primary"></i>
                                        <div>
                                            <strong>Địa chỉ:</strong><br>
                                            {{ setting('site.address') }}
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <i class="fas fa-phone-alt fa-2x me-3 text-primary"></i>
                                        <div>
                                            <strong>Điện thoại:</strong><br>
                                            {{ setting('site.phone') }}
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <i class="fas fa-envelope fa-2x me-3 text-primary"></i>
                                        <div>
                                            <strong>Email:</strong><br>
                                            {{ setting('site.gmail') }}
                                        </div>
                                    </li>
                                </ul>
                                <div class="mt-4">
                                    <iframe src="{{ setting('site.mapLink') }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="card-title mb-4">Gửi yêu cầu của bạn</h3>
                                <p class="text-muted mb-4">Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất.</p>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Họ và tên</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên của bạn" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
                                    </div>
                                     <div class="mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Chủ đề</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Nhập chủ đề" value="{{ old('title') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Nhập nội dung yêu cầu">{{ old('content') }}</textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
@endpush
