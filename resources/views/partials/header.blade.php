<!-- Header: Logo, Tên công ty, Hotline -->
<header class="top-bar shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
    <a class="company-info d-flex align-items-center" href="{{ url('/') }}" style="text-decoration: none; color: inherit;">
        <i class="bi bi-building fs-2 me-2" style="color: #dc3545;"></i>
        <span class="company-name">{{ setting('site.name', 'Công Ty Xây Dựng') }}</span>
    </a>
        <div class="hotline">
            <i class="bi bi-telephone-fill me-2"></i>
            Hotline: {{ setting('site.phone', '0123.456.789') }}
        </div>
    </div>
</header>

<!-- Menu cố định -->
<nav id="main-navbar" class="navbar navbar-expand-lg main-menu sticky-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('gioi-thieu') ? 'active' : '' }}" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('dich-vu*') ? 'active' : '' }}" href="{{ route('services.detail', 'all') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dịch vụ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if($MenuServices->isEmpty())
                            <li>không có dịch vụ nào</li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('services.detail', 'all') }}">Tất Cả Dịch Vụ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach($MenuServices as $item)
                                <li><a class="dropdown-item" href="{{ route('services.detail', $item->slug) }}">{{$item->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('mau-nha*') ? 'active' : '' }}" href="{{ route('models.detail', 'all')}}" id="navbarDropdownModels" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mẫu nhà
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownModels">
                        @if($MenuHomeType->isEmpty())
                            <li>không có mẫu nhà nào</li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('models.detail', 'all') }}">Tất Cả Mẫu Nhà</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach($MenuHomeType as $item)
                                <li><a class="dropdown-item" href="{{ route('projects.index', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('du-an*') ? 'active' : '' }}" href="{{ route('projects.index', ['slug'=>'all']) }}" id="navbarDropdownProjects" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dự án
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProjects">
                        <li><a class="dropdown-item" href="{{ route('projects.index', ['slug'=>'all']) }}">Tất Cả Dự Án</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('projects.index', ['status'=>'hoan-thanh']) }}">Dự Án Đã Hoàn Thành</a></li>
                        <li><a class="dropdown-item" href="{{ route('projects.index', ['status'=>'thi-cong']) }}">Dự Án Đang Thi Công</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('tin-tuc*') ? 'active' : '' }}" href="{{ route('news.index', ['slug'=>'all']) }}" id="navbarDropdownNews" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tin tức
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownNews">
                        @if($MenuNewCategory->isEmpty())
                            <li>không có danh mục tin tức nào</li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('news.index', ['slug'=>'all']) }}">Tất Cả</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach($MenuNewCategory as $item)
                                <li><a class="dropdown-item" href="{{ route('news.index', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('tu-van*') ? 'active' : '' }}" href="{{ route('consulting.index') }}" id="navbarDropdownConsulting" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tư vấn
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownConsulting">
                        @if($MenuConsulting->isEmpty())
                            <li>không có danh mục tu vấn</li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('consulting.index') }}">Tổng Quan Tư Vấn</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach($MenuConsulting as $item)
                            <li><a class="dropdown-item" href="{{ route('consulting.detail', $item->slug) }}">{{$item->title}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('lien-he') ? 'active' : '' }}" href="{{ url('/lien-he') }}">Liên hệ</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
