<!-- 
Component này yêu cầu truyền vào 2 biến:
- $title: Tiêu đề chính của trang (bắt buộc)
- $breadcrumbs: Một mảng các breadcrumb (tùy chọn)
  Ví dụ: ['name' => 'Dịch Vụ', 'url' => route('services.index')]
-->

<style>
    .page-header-component {
        background: url('https://binhduongconstruction.com/wp-content/uploads/2020/04/banner-xay-dung.jpg') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 80px 0;
        text-align: center;
        position: relative;
    }
    .page-header-component::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }
    .page-header-component .container {
        position: relative;
        z-index: 2;
    }
    .page-header-component h1 {
        font-size: 2.8rem;
        font-weight: 700;
    }
    .page-header-component .breadcrumb {
        background-color: transparent;
        justify-content: center;
        padding-top: 10px;
        margin-bottom: 0;
    }
    .page-header-component .breadcrumb-item a {
        color: #f8f9fa;
        text-decoration: none;
        transition: color 0.3s;
    }
    .page-header-component .breadcrumb-item a:hover {
        color: #E0E0E0;
    }
    .page-header-component .breadcrumb-item.active {
        color: #B85042; /* Màu thương hiệu */
    }
</style>

<section class="page-header-component">
    <div class="container">
        <h1>{{ $title }}</h1>
        @if(isset($breadcrumbs))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (isset($breadcrumb['url']) && !$loop->last)
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        @endif
    </div>
</section>
