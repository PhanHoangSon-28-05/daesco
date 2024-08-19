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
        <section id="gt1" class="pv-about-new--1">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-xl-6 col-text">
                            <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                                data-aos="fade-right" class="aos-init aos-animate">Giới
                                thiệu chung</h2>
                            <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                                data-aos="fade-right" class="aos-init aos-animate short">
                                {!! $catepro->page->detail_vi !!}
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <figure><img src="{{ asset('images/o-to-MITSUBISHI/daesco-1.png') }}" alt="Giới thiệu chung">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
