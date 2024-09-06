@extends('view.index')
@section('title', 'Liên hệ')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section class="pv__about--1"
            style="background-image: url('{{URL::asset('storages/'.$cate->image)}})">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h1>Liên hệ với chúng tôi</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pv__contact--1"
            style="background-image: url('{{ URL::asset('view/style/images/slider/daesco-RN-Cross_BannerWeb_1920x800\(2\).jpg') }}'); ">
            <div class="container contact-inner">
                <div class="row row-10 row-cust">
                    <div class="col-xl-12 p-10" style="position: relative;">
                        <div class="f-contact">

                            <div class="wpcf7 no-js" id="wpcf7-f176-o1" lang="vi" dir="ltr">
                                <div class="screen-reader-response">
                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form action="/danh-cho-don-vi-thu-mua/#wpcf7-f176-o1" method="post"
                                    class="wpcf7-form init" aria-label="Form liên hệ" novalidate="novalidate"
                                    data-status="init">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="176" />
                                        <input type="hidden" name="_wpcf7_version" value="5.8.2" />
                                        <input type="hidden" name="_wpcf7_locale" value="vi" />
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f176-o1" />
                                        <input type="hidden" name="_wpcf7_container_post" value="0" />
                                        <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                                    </div>
                                    <span class="wpcf7-form-control-wrap" data-name="your-company"><input size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                            aria-required="true" aria-invalid="fase" placeholder="Tên công ty  *"
                                            value="" type="text" name="your-company" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="your-website"><input size="40"
                                            class="wpcf7-form-control wpcf7-text" aria-invalid="fase"
                                            placeholder="Website công ty" value="" type="text"
                                            name="your-website" /></span>

                                    <h4>Thông tin liên hệ *</h4>

                                    <span class="wpcf7-form-control-wrap" data-name="your-name"><input size="40"
                                            class="wpcf7-form-control wpcf7-text" aria-invalid="fase"
                                            placeholder="Họ và tên" value="" type="text" name="your-name" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="your-position"><input size="40"
                                            class="wpcf7-form-control wpcf7-text" aria-invalid="fase" placeholder="Vị trí"
                                            value="" type="text" name="your-position" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="your-tel"><input size="40"
                                            class="wpcf7-form-control wpcf7-tel wpcf7-text wpcf7-validates-as-tel"
                                            aria-invalid="fase" placeholder="Số điện thoại" value="" type="tel"
                                            name="your-tel" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="your-email"><input size="40"
                                            class="wpcf7-form-control wpcf7-email wpcf7-text wpcf7-validates-as-email"
                                            aria-invalid="fase" placeholder="Email" value="" type="email"
                                            name="your-email" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="product-order"><input size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                            aria-required="true" aria-invalid="fase" placeholder="Sản phẩm đặt hàng *"
                                            value="" type="text" name="product-order" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="product-requirements"><input
                                            size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                            aria-required="true" aria-invalid="fase" placeholder="Yêu cầu sản phẩm  *"
                                            value="" type="text" name="product-requirements" /></span>

                                    <span class="wpcf7-form-control-wrap" data-name="your-message"><input size="40"
                                            class="wpcf7-form-control wpcf7-text" aria-invalid="fase"
                                            placeholder="Ghi chú" value="" type="text"
                                            name="your-message" /></span>

                                    <input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit"
                                        value="Gửi yêu cầu" />
                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pv__contact--2">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.5441381958844!2d108.21851531098113!3d16.037228940229095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219ebe16db339%3A0xb6321973a98175ff!2zNTEgUGhhbiDEkMSDbmcgTMawdSwgSG_DoCBDxrDhu51uZyBC4bqvYywgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1718134196388!5m2!1svi!2s"
                width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="title">
                <h2>Liên hệ với chúng tôi</h2>
                <div class="list">
                    <div class="item">
                        <img src="{{ URL::asset('view/style/uploads/2023/01/c-1.png') }}" alt="Địa chỉ">
                        <div class="desc">
                            <span>Địa chỉ</span> <a target="_blank" href="#!">51 Phan Đăng Lưu, Hòa Cường
                                Nam
                                <br />, Quận Hải Châu, TP. Đà Nẵng</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ URL::asset('view/style/uploads/2023/01/c-2.png') }}" alt="Số điện thoại">
                        <div class="desc">
                            <span>Số điện thoại</span> <a target="_blank" href="tel:(84-236) 3821637 - 382348">(84-236)
                                3821637 - 3823487</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ URL::asset('view/style/uploads/2023/01/c-3.png') }}" alt="Email">
                        <div class="desc">
                            <span>Email</span> <a target="_blank"
                                href="mailto:thanhpvmdaesco@gmail.com">thanhpvmdaesco@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="social">
                    <ul>
                        <li>
                            <a target="_blank" href="#!"><img
                                    src="{{ URL::asset('view/style/uploads/2023/01/y.png') }}" alt="youtube"></a>
                        </li>
                        <li>
                            <a target="_blank"
                                href="https://www.linkedin.com/company/petrovietnam-machinery-technology-jsc/"><img
                                    src="{{ URL::asset('view/style/uploads/2023/09/Linkedin.png') }}" alt="linkedin"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/pvmachino"><img
                                    src="{{ URL::asset('view/style/uploads/2023/01/f.png') }}" alt="facebook"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
