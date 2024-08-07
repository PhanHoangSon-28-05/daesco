@extends('view.index')
@section('title', $postDetail->name_vi)
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
