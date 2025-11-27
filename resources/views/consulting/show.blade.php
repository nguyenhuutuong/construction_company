@extends('layouts.app')

@section('title', $consulting->title . ' - HTcons')

@section('content')

@include('partials.page-header', [
    'title' => 'Chi Tiết Dịch Vụ',
    'breadcrumbs' => [
        ['name' => 'Tư vấn', 'url' => route('consulting.index')],
        ['name' => $consulting->title]
    ]
])

<style>
    /* Using similar styles to news.show.blade.php */
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
    .sidebar-sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
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
                    <h1 class="article-title mb-3">{{ $consulting->title }}</h1>
                    <div class="article-meta">
                        <span>Ngày đăng: {{ $consulting->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="article-content">
                        @if($consulting->image)
                        <img src="{{ Voyager::image($consulting->image) }}" alt="{{ $consulting->title }}" class="img-fluid rounded mb-4">
                        @endif

                        {!! $consulting->content !!}
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                 <div class="sidebar-sticky">
                    <aside class="sidebar">
                        <!-- Latest Posts Widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Tư vấn khác</h3>
                            <div class="latest-posts">
                                @if($hotConsultings->count() > 0)
                                    @foreach($hotConsultings as $item)
                                    <div class="post-item">
                                        <div class="post-item-body">
                                            <div class="post-title">
                                                <a href="{{ route('consulting.detail', $item->slug) }}">{{$item->title}}</a>
                                            </div>
                                            <div class="post-date">{{ $item->created_at->format('d/m/Y') }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p>Không có bài viết liên quan.</p>
                                @endif
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
