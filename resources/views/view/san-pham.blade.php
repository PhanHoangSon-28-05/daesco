@extends('view.index')
@section('title', 'Sản phẩm Mitshubishi')
@section('style')
    <style>
        .sub-menu {
            display: none;
            list-style-type: none;
            padding-left: 20px;
        }
    </style>
@endsection
@section('content')
    <main id="content-wrapper" class="main-v2">
        <section class="pv__about--1" style="background-image: url('{{ URL::asset('storages/' . $cate->image) }}');">
            <div class="container">
                @if (isset($products))
                    <div class="title">
                        <h1>Sản Phẩm</h1>
                    </div>
                @else
                    <div class="title">
                        <h1>Dịch vụ bãi</h1>
                    </div>
                @endif
            </div>
        </section>
        <section id="product" class="pv-about-new--1">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-md-4">
                            <!-- Contact Box -->
                            <div class="contact-box mb-4 border border-secondary rounded">
                                <div class="bg-danger px-3 py-2 text-white ">
                                    <h5 class=""><i class="fa-solid fa-clock-rotate-left"></i> Liên hệ mua hàng</h5>
                                </div>
                                @foreach ($hotlines as $hotline)
                                    <div class="px-3 pt-2 ">
                                        <p>{{ $hotline->name_vi }}</p>
                                        <p><i class="fas fa-phone"></i> {{ $hotline->phone }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="contact-box mb-4 border border-secondary rounded">
                                <div class="bg-danger px-3 py-2 text-white ">
                                    <h5 class=""><i class="fas fa-car"></i> Sản phẩm</h5>
                                </div>
                                <div class="pt-2">
                                    <ul class="list-group list-group-flush" style="margin-left: 0px">
                                        <li class="list-group-item">
                                            <a href="{{ URL::route('mitshubishi') }}">Ô tô
                                                Mitsubishi</a>
                                            {{-- <a href="#" id="toggleMenu" class="d-block text-dark">Ô tô
                                                Mitsubishi</a>
                                            <ul class="sub-menu">
                                                <li class="border-bottom border-secondary text-dark"><a href="">NEW
                                                        TRITON</a></li>
                                            </ul> --}}
                                        </li>
                                        <li class="list-group-item"><a href="{{ URL::route('warehouse-business') }}">Dịch vụ
                                                cho
                                                thuê kho
                                                bãi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="col-md-8">
                            @if (isset($products))
                                <div class="">
                                    <h4 class="mb-4">Sản phẩm mới nhất</h4>
                                    <div class="row product-list">
                                        @foreach ($products as $value)
                                            <div class="col-md-4 product-item ">
                                                {{-- <a href="{{  $value->links }}"> --}}
                                                <a href="{{ route('datile.mitshubishi', $value->slug) }}">
                                                    @if ($value->pic)
                                                        <img src="{{ URL::asset('storages/' . $value->pic) }}"
                                                            alt="{{ $value->name_vi }}">
                                                    @else
                                                        <img src="{{ asset('storage/image-erro.png') }}"
                                                            alt="{{ $value->name_vi }}">
                                                    @endif
                                                    <h6>{{ $value->title_vi }}</h6>
                                                    <p>{{ number_format($value->price, 0, ',', '.') }} (VAT)</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if (count($services) >= 1)
                                <div class="">
                                    <h4 class="mb-4">Dịch vụ</h4>
                                    <div class="row product-list">
                                        @foreach ($services as $value)
                                            <div class="col-md-4 product-item">
                                                <a href="{{ URL::route('detail.warehouse-business', $value->slug) }}">
                                                    @if ($value->pic)
                                                        <img src="{{ URL::asset('storages/' . $value->pic) }}"
                                                            alt="XPANDER CROSS">
                                                    @else
                                                        <img src="{{ asset('storage/image-erro.png') }}"
                                                            alt="{{ $value->name_vi }}">
                                                    @endif

                                                    <h6>{{ $value->name_vi }}</h6>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        document.getElementById('toggleMenu').addEventListener('click', function(event) {
            event.preventDefault();
            const subMenu = this.nextElementSibling;
            if (subMenu.style.display === "block") {
                subMenu.style.display = "none";
            } else {
                subMenu.style.display = "block";
            }
        });
    </script>
@endsection
