@extends('view.index')
@section('title', 'Bộ máy phát triển')
@section('content')
    <!-- Content -->
    <main id="content-wrapper" class="main-v2">
        <section id="about1" class="pv__about--1"
            style="background-image: url('https://pvmachino.vn/wp-content/uploads/2023/08/Rectangle-2-1.png');">
            <div class="container">
                <div class="title">
                    <div class="link-title"><span><span class="breadcrumb_last" aria-current="page">Quá trình hình thành &#038;
                                Phát triển</span></span></div>
                    <h1>Quá trình hình thành & phát triển</h1>
                </div>
            </div>
        </section>
        <section id="about2" class="pv__about--6">
            <div class="container">
                <div class="content">
                    <h2>QUÁ TRÌNH HÌNH THÀNH & PHÁT TRIỂN</h2>
                    <div class="pv__chart">
                        @foreach ($developments as $development)
                            <div class="item">
                                <div class="title">
                                    <strong>{{ $development->date }}</strong>
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
        <section id="activity-4b" class="pv__activity--4 activity-4v2">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <div class="row">
                            <div class="col-md-2 col-xl-3"></div>
                            <div class="col-md-8 col-xl-6 col-center">
                                <h2>HỆ THỐNG ĐẠI LÝ MITSUBISHI MORTOR</h2>
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
        <section id="about4" class="pv__about--7">
            <div class="container">
                <div class="content">
                    <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                        data-aos="fade-up" class="aos-init aos-animate">Cơ cấu tổ chức</h2>
                    <div data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                        data-aos="fade-up" class="aos-init aos-animate ab-title-tab">
                        <ul class="tabs-partner clearfix" data-tabgroup="first-tab-group">
                            <li rel="#tab1" class="active-tab">HỘI ĐỒNG QUẢN TRỊ</li>
                            <li rel="#tab2">BAN TỔNG GIÁM ĐỐC</li>
                            <li rel="#tab3">BAN KIỂM SOÁT</li>
                        </ul>
                    </div>
                </div>
                <div id="first-tab-group" class="ab-content-tab">
                    <div id="tab1" class="ab-item-tab">
                        <div class="item-inner">
                            <div class="item">
                                <picture><img
                                        src="https://pvmachino.vn/wp-content/themes/wecangroup-child/dist/images/featured.jpg"
                                        alt="Ông Đặng Văn Thân" /></picture>
                                <div class="description">
                                    <h4>Ông Đặng Văn Thân</h4>
                                    <p>Chủ tịch HĐQT</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/09/TGD-scaled.jpg"
                                        alt="Ông Phạm Văn Hiệp"></picture>
                                <div class="description">
                                    <h4>Ông Phạm Văn Hiệp</h4>
                                    <p>Thành viên HĐQT, Tổng Giám đốc</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/09/thanh-vien-scaled.jpg"
                                        alt="Ông Nguyễn Minh Tuấn"></picture>
                                <div class="description">
                                    <h4>Ông Nguyễn Minh Tuấn</h4>
                                    <p>Thành viên HĐQT</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/10/A-Thang-scaled.jpg"
                                        alt="Ông Vương Hoàng Thăng"></picture>
                                <div class="description">
                                    <h4>Ông Vương Hoàng Thăng</h4>
                                    <p>Thành viên HĐQT</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/10/Chi-Diep-scaled.jpg"
                                        alt="Bà Tống Thị Điệp"></picture>
                                <div class="description">
                                    <h4>Bà Tống Thị Điệp</h4>
                                    <p>Thành viên HĐQT</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="ab-item-tab">
                        <div class="item-inner">
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/09/TGD-scaled.jpg"
                                        alt="Ông Phạm Văn Hiệp"></picture>
                                <div class="description">
                                    <h4>Ông Phạm Văn Hiệp</h4>
                                    <p>Tổng Giám đốc</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/09/2-scaled.jpg"
                                        alt="Ông Phan Trung Nghĩa"></picture>
                                <div class="description">
                                    <h4>Ông Phan Trung Nghĩa</h4>
                                    <p>Phó Tổng Giám đốc</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/09/1-scaled.jpg"
                                        alt="Ông Nguyễn Hồng Hà"></picture>
                                <div class="description">
                                    <h4>Ông Nguyễn Hồng Hà</h4>
                                    <p>Phó Tổng Giám đốc</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/09/3-scaled.jpg"
                                        alt="Ông Chu Thành Nam"></picture>
                                <div class="description">
                                    <h4>Ông Chu Thành Nam</h4>
                                    <p>Phó Tổng Giám đốc</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img
                                        src="https://pvmachino.vn/wp-content/themes/wecangroup-child/dist/images/featured.jpg"
                                        alt="Bà Phạm Thị Mỹ Hường" /></picture>
                                <div class="description">
                                    <h4>Bà Phạm Thị Mỹ Hường</h4>
                                    <p>Phó Tổng Giám đốc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="ab-item-tab">
                        <div class="item-inner">
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/07/pvmachino14494.png"
                                        alt="Bà Lê Thị Kiều Vân"></picture>
                                <div class="description">
                                    <h4>Bà Lê Thị Kiều Vân</h4>
                                    <p>Trưởng BKS</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img
                                        src="https://pvmachino.vn/wp-content/uploads/2023/07/pvmachino14561-e1695804200276.png"
                                        alt="Bà Phạm Thị Hải An"></picture>
                                <div class="description">
                                    <h4>Bà Phạm Thị Hải An</h4>
                                    <p>Thành viên ban BKS</p>
                                </div>
                            </div>
                            <div class="item">
                                <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/07/pvmachino14603.png"
                                        alt="Bà Hà Thị Thanh Hậu"></picture>
                                <div class="description">
                                    <h4>Bà Hà Thị Thanh Hậu</h4>
                                    <p>Thành viên ban BKS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about5" class="pv__about-8">
            <div class="container">
                <h2 data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                    data-aos="fade-up" class="aos-init aos-animate">Sơ đồ tổ chức</h2>
                <picture data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1200"
                    data-aos="fade-up" class="aos-init aos-animate"><img
                        src="https://pvmachino.vn/wp-content/uploads/2023/09/z4626022372463_402ae7392f5f2fd895a2dc77f2f25add.jpg"
                        alt="chart image"></picture>
            </div>
        </section>
    </main>
@endsection
