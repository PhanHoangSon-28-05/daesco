@extends('view.index')
@section('title', $catepros->name_vi)
@section('stylee')
    <style>

    </style>
@endsection

@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="activity main-v2">
        <section id="activity-1" class="pv__activity--1"
            style="background-image: url('{{URL::asset('storages/'.$cate->image)}}');">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="link-title"><span><span class="breadcrumb_last"
                                    aria-current="page">{{ $catepros->name_vi }}</span></span></div>
                        <h1>{{ $catepros->name_vi }}</h1>
                    </div>
                </div>
            </div>
        </section>
        <section id="activity-4a" class="pv__activity--4">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="row">
                            <div class="col-md-2 col-xl-3"></div>
                            <div class="col-md-8 col-xl-6 col-center">
                                <h2>
                                    @if ($slugCate == 'xe-xpander')
                                        Sản phẩm
                                    @else
                                        Bãi
                                    @endif
                                </h2>
                                <p></p>
                            </div>
                            <div class="col-md-2 col-xl-3"></div>
                        </div>
                    </div>
                    <div class="list-activity-blog product">
                        <div class="row">
                            @if (count($catepros->prod) > 0)
                                @foreach ($catepros->prod as $value)
                                    <div class="col-md-3 ac-blog">
                                        <div class="acb-item">
                                            <a href="{{ $value->links }}">
                                                <div class="img">
                                                    <img src="{{ asset('storages/' . $value->pic) ?? asset('storages/image-erro.png') }}"
                                                        alt="blog">
                                                    </figure>
                                                </div>
                                                <div class="desc">
                                                    <h3>{{ $value->title_vi }}</h3>
                                                    <p>{{ $value->price }}</p>
                                                    <button>Tìm hiểu thêm<i class="fa-solid fa-angle-right"></i></button>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (!empty($services) > 0)
                                    @foreach ($services as $value)
                                        <div class="col-md-3 ac-blog">
                                            <div class="acb-item">
                                                <a href="{{ $value->links }}">
                                                    <div class="img">
                                                        <figure><img
                                                                src="@if (file_exists(public_path('storages/' . $value->pic))) {{ asset('storages/' . $value->pic) }}
                                                            @else
                                                            {{ asset('storages/image-erro.png') }} @endif"
                                                                alt="blog">
                                                        </figure>
                                                    </div>
                                                    <div class="desc">
                                                        <h3>{{ $value->name_vi }}</h3>
                                                        <button>Tìm hiểu thêm<i
                                                                class="fa-solid fa-angle-right"></i></button>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>Trang chưa có nội dung!</h3>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="activity-4b" class="pv__activity--4 activity-4v2">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="row">
                            <div class="col-md-2 col-xl-3"></div>
                            <div class="col-md-8 col-xl-6 col-center">
                                <h2>HỆ THỐNG ĐẠI LÝ MITSUBISHI MORTOR</h2>
                            </div>
                            <div class="col-md-2 col-xl-3"></div>
                        </div>
                    </div>
                    <div class="list-activity-blog">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 ac-blog">
                                <div class="acb-item">
                                    <a href="https://mitsubishidanang.com.vn/">
                                        <div class="img">
                                            <figure><img src="{{ URL::asset('view/style/images/thanh-pho/da-nang.jpg') }}"
                                                    alt="blog">
                                            </figure>
                                        </div>
                                        <div class="desc">
                                            <h3>Đà Nẵng</h3>
                                            <p></p>
                                            <button>Tìm hiểu thêm<i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 ac-blog">
                                <div class="acb-item">
                                    <a href="https://mitsubishi-motors-daescohue.com.vn/">
                                        <div class="img">
                                            <figure><img src="{{ URL::asset('view/style/images/thanh-pho/hue.jpg') }}"
                                                    alt="blog">
                                            </figure>
                                        </div>
                                        <div class="desc">
                                            <h3>Huế</h3>
                                            <p></p>
                                            <button>Tìm hiểu thêm<i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 ac-blog">
                                <div class="acb-item">
                                    <a href="">
                                        <div class="img">
                                            <figure><img
                                                    src="{{ URL::asset('view/style/images/thanh-pho/quang-tri.jpg') }}"
                                                    alt="blog">
                                            </figure>
                                        </div>
                                        <div class="desc">
                                            <h3>Quảng tri</h3>
                                            <p></p>
                                            <button>Tìm hiểu thêm<i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!--end-content-wrapper-->
@endsection
