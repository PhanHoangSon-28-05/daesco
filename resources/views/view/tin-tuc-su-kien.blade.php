<?php use Carbon\Carbon; ?>
@extends('view.index')
@section('title', 'Tin tức và sự kiện')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section class="pv__newsroom--5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title">
                            <h2>Tin tức & Sự kiện</h2>
                        </div>
                        <div class="content">
                            <div class="row row-10">
                                @foreach ($posts as $post)
                                    <div class="col-md-6 p-10">
                                        <div class="blog">
                                            <a href="{{ URL::route('datile.news', $post->slug) }}" class="img">
                                                <picture>
                                                    @if ($post->pic)
                                                    <img src="{{ asset('storages/' . $post->pic) }}" alt="{{ $post->name_vi }}" />
                                                    @else
                                                    {{-- <img src="{{ asset('view/style/images/post/daesco-tải xuống.jpg') }}" alt="{{ $post->name_vi }}" /> --}}
                                                    <img src="{{ asset('images/placeholder/placeholder.png') }}" alt="{{ $post->name_vi }}" />
                                                    @endif
                                                </picture>

                                                <div class="desc">
                                                    {{-- <a href="" class="cate">Thông
                                                        tin công ty</a> --}}
                                                    <h4><a
                                                            href="{{ URL::route('datile.news', $post->slug) }}">{{ $post->name_vi }}</a>
                                                    </h4>
                                                    <span
                                                        class="time">{{ Carbon::parse($post->created_at)->toDateString() }}</span>
                                                    <p class="note">{{ $post->description_vi }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination-container">
                                {!! $posts->links() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            {{-- <div class="contact-bar mt-1 mb-2 bg-light border border-secondary">
                                <div class="contact-header bg-danger text-white p-2">
                                    <i class="fas fa-clock"></i> LIÊN HỆ MUA HÀNG
                                </div>
                                <div class="contact-body p-2">
                                    <p class="mb-1"><strong>Trần Hữu Thành</strong></p>
                                    <p><i class="fas fa-phone"></i> <span class="text-danger">0903525526</span></p>
                                </div>
                            </div> --}}
                            <div class="list-bar">
                                <h3>Bài viết mới nhất</h3>
                                @foreach ($posts as $post)
                                    <div class="blog">
                                        <div class="item">
                                            {{-- <a href="" class="cate">Thông tin
                                                công ty</a> --}}
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
        </section>
    </main>
@endsection
