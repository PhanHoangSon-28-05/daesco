@extends('view.index')
@section('title', $postDetail->name_vi)
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
        <section class="pv__newsroom--5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title">
                            <h2 class="">{{ $postDetail->name_vi }}</h2>
                        </div>
                        <div class="content">
                            <div class="row row-10">
                                {!! $postDetail->detail_vi !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="contact-bar mt-1 mb-2 bg-light border border-secondary">
                                <div class="contact-header bg-danger text-white p-2">
                                    <i class="fas fa-clock"></i> LIÊN HỆ MUA HÀNG
                                </div>
                                <div class="contact-body p-2">
                                    @foreach ($hotlines as $hotline)
                                        <p class="mb-1"><strong>{{ $hotline->name_vi }}</strong></p>
                                        <p><i class="fas fa-phone"></i> <span
                                                class="text-danger">{{ $hotline->phone }}</span></p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="list-bar">
                                <h3>Bài viết mới nhất</h3>
                                @foreach ($posts as $post)
                                    <div class="blog">
                                        <div class="item">
                                            {{-- <a href="" class="cate">Thông tin công ty</a> --}}
                                            <h4><a
                                                    href="{{ URL::route('datile.news', $post->slug) }}">{{ $post->name_vi }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
