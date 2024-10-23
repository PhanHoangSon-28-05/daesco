@extends('view.index')
@section('title', 'Bộ máy phát triển')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section id="pv__newsroom--1" class="pv__about--1"
            style="background-image: url('{{ URL::asset('storages/' . $cate->image) }}');">
            <div class="container">
                <div class="title">
                    <h1>Quá trình hình thành & phát triển</h1>
                </div>
            </div>
        </section>
        <section id="development-process" class="pv__about--6">
            <div class="container">
                <div class="content">
                    <h2>QUÁ TRÌNH HÌNH THÀNH & PHÁT TRIỂN</h2>
                    <div class="pv__chart">
                        @foreach ($developments as $development)
                            <div class="item">
                                <div class="title">
                                    <strong>{{ date('Y', strtotime($development->date)) }}</strong>
                                    <p>{{ $development->description }}</p>
                                </div>
                                <div class="line-middle"><span></span></div>
                                <div class="img">
                                    <picture><img src="{{ URL::asset('storages/' . $development->pic) }}" alt="chart image">
                                    </picture>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section id="agent-system" class="pv__activity--4 activity-4v2">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="row">
                            <div class="col-md-2 col-xl-3"></div>
                            <div class="col-md-8 col-xl-6 col-center">
                                <h2>HỆ THỐNG ĐẠI LÝ MITSUBISHI MOTORS</h2>
                            </div>
                            <div class="col-md-2 col-xl-3"></div>
                        </div>
                    </div>
                    <div class="list-activity-blog">
                        <div class="row">
                            @foreach ($systems as $system)
                                <div class="col-md-6 col-lg-4 ac-blog">
                                    <div class="acb-item">
                                        <a href="{{ $system->links }}">
                                            <div class="img">
                                                <figure><img src="{{ URL::asset('storages/' . $system->pic) }}"
                                                        alt="blog">
                                                </figure>
                                            </div>
                                            <div class="desc">
                                                <h3>{{ $system->name }}</h3>
                                                <button>Tìm hiểu thêm<i class="fa-solid fa-angle-right"></i></button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="organizational-structure" class="pv__about--7">
            <div class="container">
                <div class="content">
                    <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                        data-aos="fade-up" class="aos-init aos-animate">Cơ cấu tổ chức</h2>
                    <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                        data-aos="fade-up" class="aos-init aos-animate ab-title-tab">
                        <ul class="tabs-partner clearfix" data-tabgroup="first-tab-group">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($menuOrgan as $value)
                                <li rel="#tab{{ $value->id }}"
                                    class="{{ $count == 0 ? 'active-tab' : '' }} font-weight-bolder">
                                    {{ $value->name_vi }}</li>
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="first-tab-group" class="ab-content-tab">
                    @foreach ($menuOrgan as $value)
                        <div id="tab{{ $value->id }}" class="ab-item-tab">
                            <div class="item-inner">
                                @foreach ($value->organizationals as $organizational)
                                    <div class="item">
                                        <picture>
                                            @if ($organizational->pic)
                                                <img src="{{ URL::asset('storages/' . $organizational->pic) }}"
                                                    alt="{{ $organizational->name_vi }}">
                                            @else
                                                <img src="{{ asset('storage/image-erro.png') }}"
                                                    alt="{{ $organizational->name_vi }}">
                                            @endif
                                        </picture>
                                        <div class="description">
                                            <h4>{{ $organizational->name_vi }}</h4>
                                            <p>{{ $organizational->position_vi }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    {{-- <div id="tab1" class="ab-item-tab">
                        <div class="item-inner">
                            @for ($i = 1; $i < 5; $i++)
                                <div class="item">
                                    <picture><img src="{{ asset('storage/image-erro.png') }}" alt="" /></picture>
                                    <div class="description">
                                        <h4>Tên ?</h4>
                                        <p>Chức vụ</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div id="tab2" class="ab-item-tab">
                        <div class="item-inner">
                            @for ($i = 1; $i < 5; $i++)
                                <div class="item">
                                    <picture><img src="{{ asset('storage/image-erro.png') }}" alt="" /></picture>
                                    <div class="description">
                                        <h4>Tên ?</h4>
                                        <p>Chức vụ</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div id="tab3" class="ab-item-tab">
                        <div class="item-inner">
                            @for ($i = 1; $i < 5; $i++)
                                <div class="item">
                                    <picture><img src="{{ asset('storage/image-erro.png') }}" alt="" /></picture>
                                    <div class="description">
                                        <h4>Tên ?</h4>
                                        <p>Chức vụ</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <section id="organize-diagrams" class="pv__about-8">
            <div class="container">
                <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200" data-aos="fade-up"
                    class="aos-init aos-animate">Sơ đồ tổ chức</h2>
                <picture data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                    data-aos="fade-up" class="aos-init aos-animate"><img
                        src="{{ URL::asset('images/tmp/so-do-to-chuc.png') }}" alt="chart image"></picture>
            </div>
        </section>
    </main>
@endsection
