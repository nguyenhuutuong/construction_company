@extends('layouts.app')

@section('title', $project->name . ' - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Chi Tiết Dự Án',
    'breadcrumbs' => [
        ['name' => 'Dự án', 'url' => route('projects.index')],
        ['name' => $project->name]
    ]
])

<style>
    .padding-section {
        padding: 4rem 0;
    }

    .project-detail-content .date {
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .project-detail-content .date i {
        margin-right: 0.5rem;
        margin-left: 1rem;
    }
    .project-detail-content .date i:first-child {
        margin-left: 0;
    }

    .project-detail-content .main-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .info-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .property-item {
        display: flex;
        padding: 0.8rem 0;
        border-bottom: 1px solid #e9ecef;
        font-size: 0.95rem;
    }

    .property-item span {
        font-weight: 500;
        color: #1e40af; /* Tailwind blue-800 */
        flex: 0 0 180px;
    }

    .property-item div {
        color: #374151; /* Tailwind gray-700 */
        text-align: left;
        flex: 1;
    }

    .detail-content {
        margin-top: 2.5rem;
        line-height: 1.8;
        color: #333;
    }

    .detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem 0;
    }
    
    .detail-content h2, .detail-content h3 {
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .share ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .share button {
        border: none;
        background-color: #f0f0f0;
        color: #555;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 0.5rem;
        transition: all 0.3s ease;
    }

    .share button.facebook:hover {
        background-color: #3b5998;
        color: #fff;
    }
    .share button.instagram:hover {
        background-color: #e4405f;
        color: #fff;
    }
    .share button.twitter:hover {
        background-color: #1da1f2;
        color: #fff;
    }
     .share button.linkedin:hover {
        background-color: #0077b5;
        color: #fff;
    }

    /* Sidebar Styles */
    .sidebar-sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 100px; 
    }
    .article-nav {
        background-color: #f9fafb;
    }
    .ar-title {
        font-size: 1.25rem;
        font-weight: 700;
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }
    .article-nav .item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }
    .article-nav .item:last-child {
        border-bottom: none;
    }

    .article-nav .thuml {
        flex-shrink: 0;
        width: 80px;
        margin-right: 1rem;
    }
    .article-nav .thuml img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .article-nav .body .name a {
        font-weight: 600;
        color: #333;
        text-decoration: none;
    }
     .article-nav .body .name a:hover {
        color: #dc3545;
    }

    .article-nav .body .date {
        font-size: 0.85rem;
        color: #6c757d;
    }

</style>

<div class="container padding-section">
    <div class="row">
        <div class="col-lg-8 project-detail-content">
            <div class="img-list">
                <img src="{{ $project->image ? Voyager::image($project->image) : asset('images/project_default.jpg') }}" class="img-fluid rounded" alt="{{$project->name}}">
            </div>
            <hr>
            <div class="date"><i class="far fa-calendar-alt"></i> {{ $project->created_at->format('d/m/Y') }} </div>
            <h1 class="main-title mt-3">{{$project->name}}</h1>
            
            <h2 class="info-title">Thông tin công trình</h2>
            <div class="property-item"><span>Chủ đầu tư</span><div>{{$project->investor}}</div></div>
            <div class="property-item"><span>Loại hình</span><div>{{$project->project_type}}</div></div>
            <div class="property-item"><span>Diện tích khu đất</span><div>{{$project->land_area}}</div></div>
            <div class="property-item"><span>Diện tích xây dựng</span><div>{{$project->construction_area}}</div></div>
            <div class="property-item"><span>Số tầng</span><div>{{$project->floors}}</div></div>
            <div class="property-item"><span>Công năng </span><div>{!! $project->features !!}</div></div>
            <div class="property-item"><span>Địa chỉ</span><div>{{$project->address}}</div></div>
            <div class="property-item"><span>Hợp đồng</span><div>{{$project->contract_type}}</div></div>
            <div class="property-item"><span>Năm thực hiện </span><div>{{$project->year}}</div></div>

            <div class="detail-content">
                {!! $project->content !!}
            </div>
            <hr>
            <div class="share">
                <ul class="d-flex align-items-center ul-reset">
                    <li class="mr-3">Chia sẻ:</li>
                    <li><button class="facebook" onclick="window.open('https://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href));return false"><i class="fab fa-facebook-f"></i></button></li>
                    <li><button class="twitter" onclick="window.open('https://twitter.com/intent/tweet?url='+encodeURIComponent(location.href));return false"><i class="fab fa-twitter"></i></button></li>
                    <li><button class="linkedin" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url='+encodeURIComponent(location.href));return false"><i class="fab fa-linkedin-in"></i></button></li>
                </ul>
            </div>
            
        </div>
        <div class="col-lg-4">
            <div class="sidebar-sticky">
                <div class="article-nav border rounded">
                    <div class="ar-title">Dự án cùng mẫu</div>
                    <div class="p-3">
                        @if($projects->count() > 0)
                            @foreach($projects as $project)
                                <div class="item">
                                    <div class="thuml"><a href="{{route('projects.detail', $project->slug)}}"> <img src="{{ $project->image ? Voyager::image($project->image) : asset('images/project_default.jpg') }}" alt="{{$project->name}}"> </a></div>
                                    <div class="body">
                                        <div class="name"><a class="truncate" href="{{route('projects.detail', $project->slug)}}">{{$project->name}}</a></div>
                                        <div class="date mt-lg-2 mt-0"><i class="far fa-calendar-alt"></i> {{$project->created_at->format('d/m/Y')}}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Chưa có dự án nào cùng mẫu.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
