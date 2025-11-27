@extends('layouts.app')

@section('title', $news->title . ' - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Chi Tiết Bài Viết',
    'breadcrumbs' => [
        ['name' => 'Tin tức', 'url' => route('news.index')],
        ['name' => $news->title]
    ]
])

<style>
    /* Article content styles */
    .article-title {
        font-weight: 700;
        color: #333;
    }
    .article-meta {
        font-size: 0.9rem;
        color: #999;
        margin-bottom: 20px;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .article-content h4 {
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    /* Sidebar styles from news/index.blade.php */
    .sidebar-sticky {
        position: -webkit-sticky; /* For Safari */
        position: sticky;
        top: 100px; /* Adjust this value based on your sticky header's height */
    }
    .sidebar-widget {
        margin-bottom: 2.5rem;
        padding: 20px;
        background-color: #f9fafb;
        border-radius: 12px;
    }
    .widget-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
    }
    .widget-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 50px;
        height: 2px;
        background-color: #dc3545;
    }
    .category-list .list-group-item {
        padding: 0.75rem 0;
        border-bottom: 1px solid #e5e7eb;
        background: transparent;
    }
    .category-list .list-group-item a {
        text-decoration: none;
        color: #4b5563;
    }
    .category-list .list-group-item a:hover {
        color: #dc3545;
    }
    .category-list .list-group-item:last-child {
        border-bottom: none;
    }

    /* Latest posts in sidebar */
    .post-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
     .post-item:last-child {
        margin-bottom: 0;
     }
    .post-item-thumb {
        flex-shrink: 0;
        width: 60px;
        height: 60px;
        margin-right: 15px;
    }
    .post-item-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }
    .post-item-body .post-title {
        font-size: 0.9rem;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 2px;
    }
     .post-item-body .post-title a {
         text-decoration: none;
         color: #111827;
     }
      .post-item-body .post-title a:hover {
         color: #dc3545;
     }
    .post-item-body .post-date {
        font-size: 0.8rem;
        color: #6b7280;
    }
</style>

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Article Content -->
            <div class="col-lg-8">
                <article>
                    <h1 class="article-title mb-3">{{ $news->title }}</h1>
                    <div class="article-meta">
                        <span>Đăng bởi <strong>Admin</strong></span> | 
                        <span>Ngày {{ \Carbon\Carbon::parse($news->published_at)->format('d, F, Y') }}</span>
                    </div>
                    <div class="article-content">
                        <img src="{{ Voyager::image($news->image) }}" alt="{{ $news->title }}" class="img-fluid rounded mb-4">
                        
                        <p class="lead">{{ $news->summary }}</p>
                        
                        {!! $news->content !!}
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                 <div class="sidebar-sticky">
                    <aside class="sidebar">
                        <!-- Latest Posts Widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Bài viết mới nhất</h3>
                            <div class="latest-posts">
                                @foreach($hotNews as $hot)
                                <div class="post-item">
                                    <div class="post-item-thumb">
                                        <a href="{{ route('news.detail', $hot->slug) }}"><img src="{{ Voyager::image($hot->image) }}" alt="{{$hot->title}}"></a>
                                    </div>
                                    <div class="post-item-body">
                                        <div class="post-title"><a href="{{ route('news.detail', $hot->slug) }}">{{$hot->title}}</a></div>
                                        <div class="post-date">{{ \Carbon\Carbon::parse($hot->published_at)->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Danh mục</h3>
                            <div class="category-list">
                               <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="{{ route('news.index', ['slug' => 'kinh-nghiem-xay-nha']) }}">Kinh nghiệm xây nhà</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('news.index', ['slug' => 'tin-tuc-cong-ty']) }}">Tin tức công ty</a>
                                    </li>
                                     <li class="list-group-item">
                                        <a href="#">Tư vấn thiết kế</a>
                                    </li>
                                     <li class="list-group-item">
                                        <a href="#">Phong thủy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
