@extends('view.index')
@section('title')
@section('style')
    <style>
        .container .content p {
            width: 100%;
        }

        .containerSlider img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .containerSlider {
            position: relative;
        }

        /* Hide the images by default */
        .containerSlider .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .containerSlider .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .containerSlider .prev,
        .containerSlider .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .containerSlider .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .containerSlider .prev:hover,
        .containerSlider .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .containerSlider .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .containerSlider .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .containerSlider .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .containerSlider .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .containerSlider .demo {
            opacity: 0.6;
        }

        .containerSlider .active,
        .containerSlider .demo:hover {
            opacity: 1;
        }

        .scroll-box {
            width: 100%;
            max-height: 1000px;
            overflow-y: scroll;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
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
                            <h2 class="">{{ $productDetail->title_vi }}</h2>
                        </div>
                        <div class="containerSlider mb-2">
                            <?php
                            $iabove = 1;
                            $countabove = count($productDetail->images);
                            ?>
                            
                            @foreach ($productDetail->images as $img)
                                <div class="mySlides">
                                    <div class="numbertext">{{ $iabove }} / {{ $countabove }}</div>
                                    <img src="{{ asset('storages/' . $img->image) }}" style="width:100%; height: 240px">
                                </div>
                                <?php $iabove++; ?>
                            @endforeach

                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>

                            {{-- <div class="caption-container">
                                <p id="caption"></p>
                            </div> --}}

                            <div class="row mt-2">
                                <?php
                                $ibelow = 1;
                                ?>
                                <div class="col">
                                    @foreach ($productDetail->images as $img)
                                        <div class="column h-100 border mr-1">
                                            <img class="demo cursor img-fluid h-100" src="{{ asset('storages/' . $img->image) }}"
                                                style="object-fit:cover" onclick="currentSlide({{ $ibelow }})"
                                                alt="{{ $productDetail->title_vi }}">
                                        </div>
                                        <?php $ibelow++; ?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <ul class="nav nav-tabs border-bottom border-success ml-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-toggle="tab"
                                        data-target="#general" type="button" role="tab" aria-controls="general"
                                        aria-selected="true">Thông số chung</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="features-tab" data-toggle="tab" data-target="#features"
                                        type="button" role="tab" aria-controls="features" aria-selected="false">Tính
                                        năng</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact"
                                        type="button" role="tab" aria-controls="contact" aria-selected="false">Liên
                                        hệ</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active scroll-box" id="general" role="tabpanel"
                                    aria-labelledby="general-tab">
                                        {!! $productDetail->general_specifications_vi !!}
                                </div>
                                <div class="tab-pane fade scroll-box" id="features" role="tabpanel"
                                    aria-labelledby="features-tab">
                                    {!! $productDetail->features_vi !!}
                                </div>
                                <div class="tab-pane fade scroll-box" id="contact" role="tabpanel"
                                    aria-labelledby="contact-tab">...
                                </div>
                            </div>
                            <div class="row row-10">

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
                            <div class="list-bar contact-bar mt-1 mb-2 bg-light border border-secondary">
                                <h3 class="contact-header bg-danger text-white p-2">Sản phẩm khác</h3>
                                <div class="blog p-2">
                                @foreach ($products as $value)
                                    <div class="item shadow">
                                        {{-- <a href="{{ route('datile.mitshubishi', $value->slug) }}"> --}}
                                        <a href="{{ route('product.detail', $value->slug) }}">
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
                                                <div class="ml-2">
                                                    <p class="mb-1 text-body">
                                                        <strong>{{ $value->title_vi }}</strong>
                                                    </p>
                                                    <p class="text-body">
                                                        {{ number_format($value->price, 0, ',', '.') }} (VAT)
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
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
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
@endsection
