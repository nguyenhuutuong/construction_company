@extends('layouts.app')

@section('title', 'Tin Tức - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Tin Tức & Sự Kiện',
    'breadcrumbs' => [
        ['name' => 'Tin tức']
    ]
])

<style>
    /* Article list style */
    .article-entry {
        display: flex;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 1.5rem;
        background-color: #fff;
        transition: box-shadow 0.3s;
    }
    .article-entry:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    .article-thumb {
        flex: 0 0 250px; /* Fixed width for thumbnail */
    }
    .article-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .article-body {
        padding: 20px;
        flex: 1;
    }
    .article-body .article-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .article-body .article-title a {
        text-decoration: none;
        color: #111827;
    }
    .article-body .article-title a:hover {
        color: #dc3545;
    }
    .article-meta {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 0.75rem;
    }
    .article-description {
        color: #4b5563;
        font-size: 0.95rem;
    }

    /* Sidebar styles */
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

<div class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content (col-lg-8) -->
            <div class="col-lg-8">
                @if($news->isEmpty())
                    <li>không có tin tức nào</li>
                @else
                    @foreach($news as $item)
                        <!-- Article -->
                        <article class="article-entry">
                            <div class="article-thumb">
                                <a href="{{ route('news.detail', $item->slug) }}">
                                    <img src="{{ Voyager::image($item->image) }}" alt="KHỞI CÔNG BIỆT THỰ 260M2 TẠI HÀ TĨNH">
                                </a>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="{{ route('news.detail', $item->slug) }}">{{$item->title}}</a></h3>
                                <div class="article-meta"><i class="bi bi-calendar-alt"></i> {{$item->published_at}}</div>
                                <p class="article-description">{{$item->summary}}</p>
                            </div>
                        </article>
                    @endforeach
                @endif            
             <!-- More articles can be added here to demonstrate scrolling -->

            </div>

            <!-- Sidebar (col-lg-4) -->
            <div class="col-lg-4">
                <div class="sidebar-sticky">
                    <aside class="sidebar">
                        <!-- Latest Posts Widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Bài viết mới nhất</h3>
                            <div class="latest-posts">
                                @if($hotNews->isEmpty())
                                    <div class="post-item">
                                        <div>Không có bài nào mới cả</div>
                                    </div>
                                @else
                                    @foreach($hotNews as $item)
                                        <div class="post-item">
                                            <div class="post-item-thumb">
                                                <a href="{{ route('news.detail', $item->slug) }}"><img src="{{ Voyager::image($item->image) }}" alt="..."></a>
                                            </div>
                                            <div class="post-item-body">
                                                <div class="post-title"><a href="{{ route('news.detail', $item->slug) }}">{{$item->title}}</a></div>
                                                <div class="post-date">{{$item->published_at}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif            
                                
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Danh mục</h3>
                            <div class="category-list">
                               <ul class="list-group list-group-flush">
                                    @if($MenuNewCategory->isEmpty())
                                        <li>không có danh mục tin tức nào</li>
                                    @else
                                        @foreach($MenuNewCategory as $item)
                                            <li class="list-group-item">
                                                <a href="{{ route('news.index', ['id'=>$item->id]) }}">{{$item->name}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
