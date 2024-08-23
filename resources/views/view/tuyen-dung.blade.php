@extends('view.index')
@section('title', 'Tuyển dụng & Mời thầu')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="activity main-v2">
        <section class="pv__activity--1"
            style="background-image: url('{{ URL::asset('view/style/uploads/2023/08/habilidades.jpg') }}');">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="link-title"><span><span class="breadcrumb_last" aria-current="page">Tuyển
                                    dụng</span></span></div>
                        <h1>Tuyển dụng</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pv__recruitment--1">
            <div class="container">
                <div class="content">
                    {{-- <div class="row">
                        <div class="col-lg-8 col-xl-9 col-left">
                            <div class="list-recuit">
                                <div class="re-item">
                                    <div class="re-top">
                                        <div class="top-left">
                                            <h3>Tuyển dụng Nhân viên hành chính nhân sự</h3>
                                            <p>Nơi làm việc: Đà Nẵng</p>
                                            <p>Vị trí: Nhân viên hành chính nhân sự</p>
                                            <p>Số lượng tuyển: 1</p>
                                            <p>Ứng viên đủ điều kiện và quan tâm đến vị trí tuyển dụng gửi hồ sơ
                                                scan qua email: <a
                                                    href="mailto:hoaithuongdl194@gmail.com">hoaithuongdl194@gmail.com</a>
                                                <strong><em>trước ngày 20/4/2024</em></strong>. Sau khi kiểm tra
                                                hồ sơ đạt yêu cầu, Công ty sẽ liên hệ phỏng vấn. Thời gian đi
                                                làm ngay sau khi được tuyển dụng.
                                            </p>
                                        </div>
                                        <div class="top-right">
                                            <span>Đang tuyển</span>
                                        </div>
                                    </div>
                                    <div class="re-bottom">
                                        <div class="bottom-left">
                                            <button>Ngày hết hạn: 20/04/2024</button>
                                        </div>
                                        <div class="bottom-right">
                                            <a href="tuyen-dung.html7665/"><button>Chi
                                                    tiết</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-recuit">
                                <div class="re-item">
                                    <div class="re-top">
                                        <div class="top-left">
                                            <h3>Tuyển dụng Trưởng Phòng dịch vụ ô tô</h3>
                                            <p>Nơi làm việc: Đà Nẵng</p>
                                            <p>Vị trí : Trưởng Phòng dịch vụ ô tô</p>
                                            <p>Số lượng tuyển: 1</p>
                                            <p>Ứng viên đủ điều kiện và quan tâm đến vị trí tuyển dụng gửi hồ sơ
                                                scan qua email: <a
                                                    href="mailto:hoaithuongdl194@gmail.com">hoaithuongdl194@gmail.com</a>
                                                <strong><em>trước ngày 20/08/2018</em></strong>. Sau khi kiểm
                                                tra
                                                hồ sơ đạt yêu cầu, Công ty sẽ liên hệ phỏng vấn. Thời gian đi
                                                làm ngay sau khi được tuyển dụng.
                                            </p>
                                        </div>
                                        <div class="top-right">
                                            <span>Đang tuyển</span>
                                        </div>
                                    </div>
                                    <div class="re-bottom">
                                        <div class="bottom-left">
                                            <button>Ngày hết hạn: 20/08/2018</button>
                                        </div>
                                        <div class="bottom-right">
                                            <a href="tuyen-dung.htmltuyen-dung-truong-kenh-du-an-chu-dau-tu/"><button>Chi
                                                    tiết</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-3 col-right">
                            <div class="right-item nav-right">
                                <h2>Thông tin</h2>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <figure><img src="{{ URL::asset('view/style/uploads/2023/07/phone-1.png') }}"
                                                    alt="icon contact"></figure>
                                            <span>(84-236) 3821637 - 3823487</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:thanhpvmdaesco@gmail.com">
                                            <figure><img src="{{ URL::asset('view/style/uploads/2023/07/mail-1.png') }}"
                                                    alt="icon contact"></figure>
                                            <span>thanhpvmdaesco@gmail.com</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <figure><img src="{{ URL::asset('view/style/uploads/2023/07/map-4.png') }}"
                                                    alt="icon contact"></figure>
                                            <span>51 Phan Đăng Lưu, Hòa Cường Nam, Quận Hải Châu, TP. Đà
                                                Nẵng.</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    @include('view.erro')
                </div>
            </div>
        </section>
    </main>
@endsection
