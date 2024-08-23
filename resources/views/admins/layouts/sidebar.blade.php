<div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-section sidebar-user my-1">
        <div class="sidebar-section-body">
            <div class="media">
                <a href="#" class="mr-3">
                    <img src="{{ URL::asset('admins/global_assets/images/placeholders/placeholder.jpg') }}"
                        class="rounded-circle" alt="">
                </a>

                <div class="media-body">
                    <div class="font-weight-semibold">{{ Auth::user()->name }}</div>
                    <div class="font-size-sm line-height-sm opacity-50">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                <div class="ml-3 align-self-center">
                    <button type="button"
                        class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="icon-transmission"></i>
                    </button>

                    <button type="button"
                        class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                        <i class="icon-cross2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="sidebar-section">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            <li class="nav-item-header">
                <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                    title="Main"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="icon-home4"></i>
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route(\App\Models\Role::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    Chức vụ
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\User::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    Người dùng
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route(\App\Models\Category::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-bars"></i>
                    Quản lý loại
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Post::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-pencil"></i></i>
                    Quản lý bài viết
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Document::INDEX) }}" class="nav-link">
                    <i class="fa-regular fa-file-lines"></i>
                    Quản lý tài liệu
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Page::INDEX) }}" class="nav-link">
                    <i class="fa-regular fa-paste"></i>
                    Quản lý trang
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Service::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-note-sticky"></i>
                    Quản lý dịch vụ
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Product::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-car-rear"></i>
                    Quản lý sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Development::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-up-long"></i>
                    Quản lý quá trình phát triển
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\System::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-house-flag"></i>
                    Quản lý hệ thống
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Slider::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-image"></i>
                    Quản lý slider
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Ads::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-snowflake"></i>
                    Quản lý backlink
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Info::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-address-card"></i>
                    Quản lý hotline
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('filemanager') }}" class="nav-link">
                    <i class="fa-solid fa-folder"></i>
                    Quản lý file
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('headers.index') }}" class="nav-link">
                    <i class="fa-solid fa-heading"></i>
                    Quản lý top header
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('footers.index') }}" class="nav-link">
                    <i class="fa-solid fa-font-awesome"></i>
                    Quản lý top footer
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('info-products.index') }}" class="nav-link">
                    <i class="fa-solid fa-address-book"></i>
                    Liên hệ mua sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route(\App\Models\Year::INDEX) }}" class="nav-link">
                    <i class="fa-solid fa-clock"></i>
                    Quản lý năm phát hành
                </a>
            </li>
        </ul>
    </div>
    <!-- /main navigation -->

</div>
