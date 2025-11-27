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
<!-- menu tạo bằng voyager -->
    <nav class="navbar navbar-expand-lg main-menu sticky-top">
        {!! menu('site', 'vendor.voyager.menu.frontend_menu') !!}
    </nav>
