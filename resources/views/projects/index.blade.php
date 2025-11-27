@extends('layouts.app')

@section('title', 'Dự Án Đã Thực Hiện - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Các Dự Án Của Chúng Tôi',
    'breadcrumbs' => [
        ['name' => 'Dự án']
    ]
])

<style>
    .project-card-link {
        text-decoration: none;
        color: inherit;
    }
    .project-card {
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }
    .project-card-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    .project-card .card-body {
        padding: 20px;
    }
    .project-status {
        font-size: 0.8rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 20px;
    }
    .status-completed {
        background-color: #d1fae5;
        color: #065f46;
    }
    .status-in-progress {
        background-color: #dbeafe;
        color: #1e40af;
    }
</style>

<!-- Projects Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Dấu Ấn Của HTcons</h2>
            <p class="text-muted">Cùng nhìn lại những công trình mà chúng tôi đã kiến tạo nên.</p>
        </div>
        <div class="row">
            @if($projects->isEmpty())
                <div>Hiện không có dự án nào</div>
            @else
                @foreach($projects as $project)
                    <!-- Sample Project 1 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('projects.detail', $project->slug) }}" class="project-card-link">
                            <div class="project-card">
                                <img src="{{ $project->image ? Voyager::image($project->image) : asset("images/project_default.jpg") }}" class="project-card-img" alt="Dự án Biệt thự Hiện đại Quận 9">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title fw-bold mb-0">{{$project->name}}</h5>
                                        @if($project->status)
                                            <span class="project-status status-completed">Hoàn thành</span>
                                        @else
                                            <span class="project-status status-in-progress">Đang thi công</span>
                                        @endif
                                        
                                    </div>
                                    <p class="card-text text-muted small">Một không gian sống đẳng cấp, tiện nghi và chan hòa với thiên nhiên.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            

            <!-- Sample Project 2 -->
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                 <a href="{{ route('projects.detail', ['slug' => 'cai-tao-chung-cu-go-vap']) }}" class="project-card-link">
                    <div class="project-card">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=2070&auto=format&fit=crop" class="project-card-img" alt="Dự án Cải tạo Chung cư Gò Vấp">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title fw-bold mb-0">Cải tạo Chung cư Gò Vấp</h5>
                                 <span class="project-status status-in-progress">Đang thi công</span>
                            </div>
                            <p class="card-text text-muted small">Thay áo mới cho căn hộ, mang đến một không gian sống tươi mới và hiện đại.</p>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</section>

@endsection
