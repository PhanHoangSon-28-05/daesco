<?php use Carbon\Carbon; ?>

@extends('view.index')
@section('title', 'Trang chủ')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        @include('view.slider')
        <section class="pv__mapbanner--homepage">
            <div class="content-inner">
                <div class="img-ab">
                    <figure><img src="{{ URL::asset('view/style/images/product/daesco-1.png') }}" alt="about us image">
                    </figure>
                </div>
                <div class="container sp-respon">
                    <div data-aos-delay="300" data-aos-duration="1200" data-aos="fade-right"
                        class="aos-init aos-animate text">
                        <div class="title">
                            <h2>PVM DAESCO</h2>
                        </div>
                        <p style="text-align: justify;">Công ty Cổ Phần Máy - Thiết Bị Dầu Khí Đà Nẵng, tiền
                            thân là Công ty Thiết bị Phụ tùng Đà Nẵng, trước đây là Công ty thành viên của Tổng
                            Công ty Máy và Phụ tùng (MachinoImport) thuộc Bộ Thương mại. </span></p>
                        <a href="/about-us"><button class="effect-bnt">Trang Giới
                                thiệu</button></a>
                    </div>
                </div>
            </div>
        </section>
        <section id="field-operation" class="pv__operation--homepage"
            style="background-image: url('{{ URL::asset('view/style/image/detail-op.png') }}')">
            <div class="container">
                <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200" data-aos="fade-up"
                    class="aos-init aos-animate text">
                    <h2>Lĩnh vực hoạt động</h2>
                    <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                        data-aos="fade-up" class="aos-init aos-animate short">
                        <p>Gần 30 năm hoạt động tại khu vực miền trung, Tây nguyên và trên phạm vi toàn quốc,
                            bằng nội lực của mình và sự hợp tác của các bạn hàng, Công ty Cổ phần Máy - Thiết Bị
                            Dầu Khí Đà Nẵng đang không ngừng phát triển, đáp ứng ngày càng tốt hơn nhu cầu của
                            mọi thành phần kinh tế, xây dựng được cho mình một thương hiệu vững chắc trên thị
                            trường.</p>
                    </div>
                </div>
                <div class="content">
                    <div class="row row-10">
                        @foreach ($cateFieldOperations as $cate)
                            <div class="col-md-6 ope-item">
                                <div class="o-item">
                                    <div data-aos-anchor-placement="top-bottom" data-aos-delay="500"
                                        data-aos-duration="1200" data-aos="fade-up" class="aos-init aos-animate img">
                                        <figure>
                                            @if ($cate->image)
                                                <img src="{{ asset('storages/' . $cate->image) }}"
                                                    alt="{{ $cate->name_vi }}">
                                            @else
                                                <img src="{{ asset('storage/image-erro.png') }}" alt="{{ $cate->name_vi }}">
                                            @endif

                                        </figure>
                                    </div>
                                    <div class="desc text-center">
                                        <h3 data-aos-anchor-placement="top-bottom" data-aos-delay="500"
                                            data-aos-duration="1200" data-aos="fade-up"
                                            class="aos-init aos-animate font-weight-bolder text-uppercase">
                                            {{ $cate->name_vi }}</h3>
                                        @if ($cate->slug == 'mitsubishi-automobile-business')
                                            <a href=" {{ URL::route('development-apparatus', '#agent-system') }}"
                                                data-aos-anchor-placement="top-bottom" data-aos-delay="500"
                                                data-aos-duration="1200" data-aos="fade-up"
                                                class="aos-init aos-animate readmore mx-auto">Xem thêm</a>
                                        @else
                                            @if (Route::has($cate->slug))
                                                <a href=" {{ URL::route($cate->slug) }}"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="500"
                                                    data-aos-duration="1200" data-aos="fade-up"
                                                    class="aos-init aos-animate readmore mx-auto">Xem thêm</a>
                                            @else
                                                <a href="" data-aos-anchor-placement="top-bottom"
                                                    data-aos-delay="500" data-aos-duration="1200" data-aos="fade-up"
                                                    class="aos-init aos-animate readmore mx-auto">Xem thêm</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="pv__promine--homepage"
            style="background-image: url('https://pvmachino.vn/wp-content/uploads/2023/01/detail-op-1.png'); padding: 100px 0 !important;">
            <div class="content">
                <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                    data-aos="fade-right" class="aos-init text col-md-12">
                    <h2>Sản phẩm & dịch vụ</h2>
                    <p style="text-align: justify;">Công ty Cổ Phần Máy – Thiết Bị Dầu Khí Đà Nẵng</p>
                </div>
                <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                    data-aos="fade-left" class="aos-init text col-md-12">
                    <ul class="nav nav-tabs m-0 mb-1" id="productServiceTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="btn-tab active" id="product-tab" data-toggle="tab" data-target="#product"
                                type="button" role="tab" aria-controls="product" aria-selected="true">Sản
                                phẩm</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn-tab" id="service-tab" data-toggle="tab" data-target="#service"
                                type="button" role="tab" aria-controls="service" aria-selected="false">Dịch vụ
                                cho thuê kho bãi</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productServiceTabContent">
                        <div class="tab-pane fade show active" id="product" role="tabpanel"
                            aria-labelledby="product-tab">
                            <div class="list-slide">
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                        tabindex="-1">
                                        <figure><img
                                                src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/daesco-1.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">XPANDER CROSS - 2023</a></span>
                                        <h4><a href="https://mitsubishidanang.com.vn/xpander-cross" target="_blank"
                                                tabindex="-1">698.000.000 VND (VAT)</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                            <div class="list-slide">
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                                <div class="item" data-slick-index="-4" id="" aria-hidden="true"
                                    tabindex="-1">
                                    <a href="#" tabindex="-1">
                                        <figure><img src="{{ URL::asset('view/style/images/o-to-MITSUBISHI/kho.png') }}">
                                        </figure>
                                    </a>
                                    <div class="desc">
                                        <span><a href="#" tabindex="-1">Hiện nay công ty chúng tôi đa
                                                sở hữu
                                                8000m2 diện tích nhà kho kín, cơ sở hạ tầng đầy đủ, tại địa chỉ
                                                10 Nguyễn Phục- Sơn trà Đà Nẵng. Chúng tôi luôn đáp ứng nhu cầu
                                                thuê kho bãi của quý khách hàng</a></span>
                                        <h4><a href="#" class="nav-link" tabindex="-1">Xem chi
                                                tiết</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="pv__newroom--homepage">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                            data-aos="fade-top" class="aos-init aos-animate">Tin Tức
                        </h2>
                    </div>
                    <div class="row list-event">
                        <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                            data-aos="fade-right" class="aos-init aos-animate col-md-6 big-item">
                            <div class="big-blog">
                                <article class="blog">
                                    <a href="{{ URL::route('datile.news', $posts[0]->slug) }}">
                                        <div class="img">
                                            <figure>
                                                @if ($posts[0]->pic)
                                                <img src="{{ asset('storages/' . $posts[0]->pic) }}" alt="{{ $posts[0]->name_vi }}" />
                                                @else
                                                {{-- <img src="{{ asset('view/style/images/post/daesco-tải xuống.jpg') }}" alt="{{ $posts[0]->name_vi }}" /> --}}
                                                <img src="{{ asset('images/placeholder/placeholder.png') }}" alt="{{ $posts[0]->name_vi }}" />
                                                @endif
                                            </figure>
                                        </div>
                                        <div class="info">
                                            <span>Trưởng Phòng dịch vụ ô tô</span>
                                            <h3>{{ $posts[0]->name_vi }}</h3>
                                            <time><img
                                                    src="{{ URL::asset('view/style//themes/wecangroup-child/dist/images/time.svg') }}"
                                                    alt="time">{{ Carbon::parse($posts[0]->created_at)->toDateString() }}</time>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-6 col-right">
                            <div class="list-news">
                                <div class="row">
                                    @for ($i = 1; $i < 5; $i++)
                                        <div data-aos-anchor-placement="top-bottom" data-aos-delay="500"
                                            data-aos-duration="1200" data-aos="fade-left"
                                            class="aos-init aos-animate col-md-6 b-item">
                                            <article class="blog">
                                                <a href="{{ URL::route('datile.news', $posts[$i]->slug) }}">
                                                    <div class="img">
                                                        <figure>
                                                            @if ($posts[$i]->pic)
                                                            <img src="{{ asset('storages/' . $posts[$i]->pic) }}" alt="{{ $posts[$i]->name_vi }}" />
                                                            @else
                                                            {{-- <img src="{{ asset('view/style/images/post/daesco-tải xuống.jpg') }}" alt="{{ $posts[$i]->name_vi }}" /> --}}
                                                            <img src="{{ asset('images/placeholder/placeholder.png') }}" alt="{{ $posts[$i]->name_vi }}" />
                                                            @endif
                                                        </figure>
                                                    </div>
                                                    <div class="info">
                                                        {{-- <h3>Trưởng Phòng dịch vụ ô tô</h3> --}}
                                                        <h3>{{ $posts[$i]->name_vi }}</h3>
                                                        <span>{{ Carbon::parse($posts[$i]->created_at)->toDateString() }}</span>
                                                        <p>{{ $posts[$i]->description_vi }}</p>
                                                    </div>
                                                </a>
                                            </article>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ URL::route('company-regulations-and-regulations') }}"
                        data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                        data-aos="fade-up" class="aos-init aos-animate showmore">Xem
                        thêm</a>
                </div>
            </div>
        </section>
    </main><!--end-content-wrapper-->
@endsection
