@extends('view.index')
@section('title', $serviceDetail->name_vi)
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
                            <h2 class="">{{ $serviceDetail->name_vi }}</h2>
                        </div>
                        <div class="content">
                            <div class="row row-10">
                                {!! $serviceDetail->detail_vi !!}
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
                                <div class="list-bar contact-bar mt-1 mb-2 bg-light border border-secondary">
                                    <h3 class="contact-header bg-danger text-white p-2">Dịch vụ khác</h3>
                                    <div class="blog">
                                        @foreach ($services as $value)
                                            <div class="blog">
                                                <div class="item">
                                                    <a href="{{ route('service.detail', $value->slug) }}">
                                                        <div class="d-flex flex-row bd-highlight mb-3">
                                                            <div class="w-50">
                                                                @if ($value->pic)
                                                                    <img src="{{ URL::asset('storages/' . $value->pic) }}"
                                                                        alt="{{ $value->name_vi }}">
                                                                @else
                                                                    <img src="{{ asset('storage/image-erro.png') }}"
                                                                        alt="{{ $value->name_vi }}">
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <p class="mb-1 text-body ml-2">
                                                                    <strong>{{ $value->name_vi }}</strong>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
