@extends('view.index')
@section('title', 'Giới thiệu')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section class="pv__newsroom--5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title m">
                            <h2 class="">{{ $catepro->page->name_vi }}</h2>
                        </div>
                        <div class="content">
                            <div class="row row-10">
                                {!! $catepro->page->detail_vi !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="menu-sidebar mb-2 bg-light border border-secondary">
                                <ul>
                                    @foreach ($catetypes as $catetype)
                                        <li>
                                            <a
                                                href="{{ URL::route(\App\Models\View::PAGE_CATE_PRO, $catetype->slug) }}">{{ $catetype->name_vi }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="contact-bar mt-1 mb-2 bg-light border border-secondary">
                                <div class="contact-header bg-danger text-white p-2">
                                    <i class="fas fa-clock"></i> LIÊN HỆ MUA HÀNG
                                </div>
                                <div class="contact-body p-2">
                                    <p class="mb-1"><strong>Trần Hữu Thành</strong></p>
                                    <p><i class="fas fa-phone"></i> <span class="text-danger">0903525526</span></p>
                                </div>
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
