@extends('view.index')
@section('title', 'Phát Triển Bền Vững')
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
        <section class="pv__sustainability--1" style="background-image: url('{{ URL::asset('storages/' . $cate->image) }}');">
            <div class="container">
                <div class="title">
                    <h1>Phát triển bền vững</h1>
                </div>
            </div>
        </section>
        <section class="pv__sustainability--2">
            <div class="container">
                <span>PVMachino luôn đặt mục tiêu kinh doanh song hành cùng bảo vệ môi trường và lợi ích cho các bên liên
                    quan, coi đó là kim chỉ nam định hướng mọi hoạt động để thực hiện phát triển bền vững
                </span>
                <div class="list-sus">
                    <div class="row row-10">
                        <div class="col-md-4 p-10">
                            <div class="item">
                                <a href="https://pvmachino.vn/phat-trien-ben-vung/phat-trien-kinh-te/" class="img">
                                    <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/07/1.-Cam-Pha.jpeg"
                                            alt="Phát triển kinh tế" /></picture>
                                </a>
                                <div class="description">
                                    <h4><a href="https://pvmachino.vn/phat-trien-ben-vung/phat-trien-kinh-te/">Phát triển
                                            kinh tế</a></h4>
                                    <p>Không còn hoạt động chỉ trong lĩnh vực về máy - thiết bị dầu khí, PVMACHINO đang mở
                                        rộng mạnh mẽ mô hình kinh doanh với các lĩnh vực như đầu tư, kinh doanh thương
                                        mại... với muc tiêu phục vụ sản xuất và nhu cầu sinh hoạt của nhân dân, phục vụ phát
                                        triển kinh tế - xã hội. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-10">
                            <div class="item">
                                <a href="https://pvmachino.vn/phat-trien-ben-vung/trach-nghiem-xa-hoi/" class="img">
                                    <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/07/Rectangle-112-2.png"
                                            alt="Trách nhiệm xã hội" /></picture>
                                </a>
                                <div class="description">
                                    <h4><a href="https://pvmachino.vn/phat-trien-ben-vung/trach-nghiem-xa-hoi/">Trách nhiệm
                                            xã hội</a></h4>
                                    <p>PVMachino là doanh nghiệp có trách nhiệm với xã hội, hỗ trợ cộng đồng qua các quản lý
                                        đầu tư và hoạt động xã hội, thực hiện đầy đủ các quy trình an toàn lao động.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-10">
                            <div class="item">
                                <a href="https://pvmachino.vn/phat-trien-ben-vung/bao-ve-moi-truong/" class="img">
                                    <picture><img src="https://pvmachino.vn/wp-content/uploads/2023/07/Rectangle-114-2.png"
                                            alt="Bảo vệ môi trường" /></picture>
                                </a>
                                <div class="description">
                                    <h4><a href="https://pvmachino.vn/phat-trien-ben-vung/bao-ve-moi-truong/">Bảo vệ môi
                                            trường</a></h4>
                                    <p>PVMACHINO luôn ưu tiên kinh doanh các sản phẩm năng lượng sạch, chất lượng cao thân
                                        thiện với môi trường, coi trọng ứng dụng tiến bộ khoa học và và công nghệ để góp
                                        phần xây dựng một môi trường bền vững.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pv__sustainability--3">
            <div class="sus-inner">
                <div class="sus-item"
                    style="background-image: url('https://pvmachino.vn/wp-content/uploads/2023/02/left.png');">
                    <div class="text">
                        <h4>Tầm nhìn</h4>
                        <p>Khát vọng vươn mình phát triển luôn song hành cùng việc tạo ra giá trị và lợi ích cho con người
                            và cho môi trường</p>
                    </div>
                </div>
                <div class="sus-item"
                    style="background-image: url('https://pvmachino.vn/wp-content/uploads/2023/02/right.png');">
                    <div class="text">
                        <h4>Sứ mệnh</h4>
                        <p>Phụng sự Tổ quốc, phụng sự nhân loại bằng việc luôn kiến tạo sản phẩm, dịch vụ hướng đến phát
                            triển bền vững.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
