<?php use Carbon\Carbon; ?>

@extends('view.index')
@section('title', $catepros->name_vi)
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section class="pv__newsroom--5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title">
                            <div class="link-title"><span><span class="breadcrumb_last"
                                        aria-current="page">{{ $catepros->name_vi }}</span></span></div>
                            <h2 class="">{{ $catepros->name_vi }}</h2>
                        </div>
                        <div class="content">
                            <div class="row row-10">
                                @foreach ($posts as $post)
                                    <div class="col-md-6 p-10">
                                        <div class="blog">
                                            <a href="{{ URL::route('datile.news', [$slugCate, $post->slug]) }}"
                                                class="img">
                                                <picture><img
                                                        src="@if (file_exists(public_path('storage/' . $post->pic)) && $post->pic) {{ asset('storage/' . $post->pic) }}
                                                            @else
                                                            {{ URL::asset('view/style/images/post/daesco-tải xuống.jpg') }} @endif"
                                                        alt="{{ $post->name_vi }}" />
                                                </picture>

                                                <div class="desc">
                                                    <a href="" class="cate">Thông
                                                        tin công ty</a>
                                                    <h4><a
                                                            href="{{ URL::route('datile.news', [$slugCate, $post->slug]) }}">{{ $post->name_vi }}</a>
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
                            <div class="menu-sidebar">
                                <ul>
                                    @foreach ($catetypes as $catetype)
                                        <li>
                                            <a
                                                href="{{ URL::route(\App\Models\View::PAGE_CATE_PRO, $catetype->slug) }}">{{ $catetype->name_vi }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="list-bar">
                                <h3>Bài viết mới nhất</h3>
                                @foreach ($posttakes as $posttake)
                                    <div class="blog">
                                        <div class="item">
                                            <a href="" class="cate">Thông tin
                                                công ty</a>
                                            <h4><a href="">{{ $posttake->name_vi }}</a>
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
