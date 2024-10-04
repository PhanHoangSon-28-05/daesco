@extends('view.index')
@section('title', 'Giới thiệu')
@section('style')
    <style>
        .container .content p {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section class="pv__about--1" style="background-image: url('{{URL::asset('storages/'.$cate->image)}}');">
            <div class="container">
                <div class="title">
                    <h1>Tổng quan</h1>
                </div>
            </div>
        </section>
        <section id="introduce" class="pv-about-new--1">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col col-text">
                            <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                                data-aos="fade-right" class="aos-init aos-animate">Giới
                                thiệu chung</h2>
                            <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                                data-aos="fade-right" class="aos-init aos-animate short">
                                @if ($cate->page)
                                    {!! $cate->page->detail_vi !!}
                                @else
                                    <h2>Nội dung đang cập nhập. Quý khách hàng vui lòng trở lại sau. </br>
                                        Xin cảm ơn !</h2>
                                    <h2><a href="{{ URL::route('home') }}"><i class="fa-solid fa-left-long"></i> Quay lại
                                            trang chủ</a></h2>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="col-xl-6">
                            <figure><img src="{{ asset('images/o-to-MITSUBISHI/daesco-1.png') }}" alt="Giới thiệu chung">
                            </figure>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
