@extends('view.index')
@section('title', 'Thư viện')
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
        <section class="archive-library-1"
            style="background-image: url('{{URL::asset('storages/'.$cate->image)}}');">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="link-title"><span><span class="breadcrumb_last" aria-current="page">Thư viện</span></span>
                        </div>
                        <h1>Thư viện</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pv__library--homepage">
            <div class="container">
                <div class="content">
                    {{-- <div class="list-library">
                        <div class="row">
                            <div class="col-md-6 col-left">
                                <div class="lib-item">
                                    <a class="overlay" href="http://pvmachino.vn/thu-vien/dubai-chamber-of-commerce/">
                                        <figure>
                                            <img class="img-overlay"
                                                src="https://pvmachino.vn/wp-content/uploads/2023/09/MG_3586-scaled-e1695711119414-1536x940-1.jpg"
                                                alt="gallery image">
                                        </figure>
                                    </a>
                                    <div class="text-video">
                                        <time>17/07/2023</time>
                                        <h3>PVMACHINO tiếp đón Phòng Thương mại Dubai</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-right">
                                <div class="row">
                                    <div class="col-md-6 li-item">
                                        <div class="lib-item">
                                            <a class="overlay"
                                                href="http://pvmachino.vn/thu-vien/dau-tu-du-an-cum-vong-nghiep-dinh-lap/">
                                                <figure>
                                                    <img class="img-overlay"
                                                        src="https://pvmachino.vn/wp-content/uploads/2023/08/MG_3636-scaled.jpg"
                                                        alt="gallery image">
                                                </figure>
                                            </a>
                                            <div class="text-video">
                                                <time>14/08/2023</time>
                                                <h3>Lễ ký kết Hợp đồng hợp tác Đầu tư Dự án Cụm công nghiệp Đình Lập tại
                                                    tỉnh
                                                    Lạng Sơn</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 li-item">
                                        <div class="lib-item">
                                            <a class="overlay"
                                                href="http://pvmachino.vn/thu-vien/du-an-nha-o-thuong-mai-khu-dan-cu-an-phu/">
                                                <figure>
                                                    <img class="img-overlay"
                                                        src="https://pvmachino.vn/wp-content/uploads/2023/09/3-1-scaled-1.jpg"
                                                        alt="gallery image">
                                                </figure>
                                            </a>
                                            <div class="text-video">
                                                <time>11/09/2023</time>
                                                <h3>Lễ ký kết Hợp đồng hợp tác đầu tư Dự án nhà ở thương mại Khu dân cư An
                                                    Phú
                                                    và Dự án nhà ở thương mại Tiền Phong</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 li-item">
                                        <div class="lib-item">
                                            <a class="overlay"
                                                href="http://pvmachino.vn/thu-vien/pvmachino-tham-du-hoi-ngi-giao-thuong-vietnam-arapxeut/">
                                                <figure>
                                                    <img class="img-overlay"
                                                        src="https://pvmachino.vn/wp-content/uploads/2023/09/z4728206051569_acd02d58c3f6c907dd3182eb84bdfc30-e1695713210178-743x1024-1.jpg"
                                                        alt="gallery image">
                                                </figure>
                                            </a>
                                            <div class="text-video">
                                                <time>13/09/2023</time>
                                                <h3>PVMACHINO vinh hạnh tham dự Hội nghị Giao ban kết nối Giao Thương Việt
                                                    Nam –
                                                    Ả-rập Xê-Út</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 li-item">
                                        <div class="lib-item">
                                            <a class="overlay"
                                                href="http://pvmachino.vn/thu-vien/pvmachino-ung-ho-nam-nhan-vu-chay-chung-cu-mini/">
                                                <figure>
                                                    <img class="img-overlay"
                                                        src="https://pvmachino.vn/wp-content/uploads/2023/09/Anh-Sua.jpg"
                                                        alt="gallery image">
                                                </figure>
                                            </a>
                                            <div class="text-video">
                                                <time>23/09/2023</time>
                                                <h3>Công ty Cổ phần Máy – Thiết bị Dầu khí chung tay ủng hộ các nạn nhân
                                                    trong
                                                    vụ cháy chung cư mini</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-lib">
                            <div class="cust-row">
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay" href="http://pvmachino.vn/thu-vien/chuyen-tu-thien-lao-cai/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/MG_0028-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Chuyến từ thiện Lào Cai</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay" href="http://pvmachino.vn/thu-vien/chuyen-tu-thien-thanh-hoa/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/MG_0890-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Chuyến từ thiện Thanh Hoá</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay" href="http://pvmachino.vn/thu-vien/hoi-nghi-tong-ket-nam-2018/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/MG_5957-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Hội nghị tổng kết năm 2018</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/chao-mung-ngay-phu-nu-viet-nam-2019/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/MG_6422-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Ngày phụ nữ Việt Nam 2019</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/thanh-lap-cong-ty-co-phan-machino-thanh-dat/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/MG_2656-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Thành lập Công ty Cổ Phần Machino </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/chuyen-cong-tac-xuc-tien-thuong-mai-tai-ghana-an-do-dubai/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/08/PHOTO-2022-09-16-20-46-29-4.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Chuyến công tác xúc tiến thương mại tại Ghana - Ấn Độ - Dubai</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay" href="http://pvmachino.vn/thu-vien/album-khac/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/08/Nha-may-rac-Quynh-Minh-phoi-canh.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Khác</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/ky-niem-56-nam-thanh-lap-cong-ty/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/08/IMG_2040-scaled-1.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Kỷ niệm 56 năm thành lập công ty</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/chuyen-tu-thien-mien-trung/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/mt8.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Kỷ niệm Chuyến từ thiện miền Trung năm thành lập công ty</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay" href="http://pvmachino.vn/thu-vien/chuyen-tu-thien-muong-lat/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/IMG_8563-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Chuyến từ thiện Mường Lát</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/ky-niem-60-nam-thanh-lap-cong-ty/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/Tap-The-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Kỷ niệm 60 năm thành lập công ty</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-item">
                                    <div class="lib-item">
                                        <a class="overlay"
                                            href="http://pvmachino.vn/thu-vien/dai-hoi-co-dong-cong-ty-nam-2017/">
                                            <figure>
                                                <img class="img-overlay"
                                                    src="https://pvmachino.vn/wp-content/uploads/2023/07/MG_5957-scaled.jpg"
                                                    alt="gallery image">
                                            </figure>
                                        </a>
                                        <div class="text-video">
                                            <h3>Đại hội cổ đông Công ty năm 2017</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @include('view.erro')
                </div>
            </div>
        </section>

    </main>
@endsection
