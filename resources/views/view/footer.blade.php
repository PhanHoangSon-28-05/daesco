<footer id="footer" class="footer"
    style="background-image: url('{{ URL::asset('view/style/images/tmp/footer-bg.png') }}');">
    <div class="footer-inner">
        <div class="container">
            <div class="footer-middle">
                <div class="row">
                    <div class="col-md-6">
                        <div class="f-about">
                            <h2>Công ty Cổ Phần Máy - Thiết Bị Dầu Khí Đà Nẵng</h2>
                            <ul>
                                <li>
                                    <img src="{{ URL::asset('view/style/uploads/2022/12/map.png') }}" alt="icon contact">
                                    <a href="#">{{ $footer->address }}</a>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('view/style/uploads/2022/12/tel.png') }}"
                                        alt="icon contact">
                                    <a href="#">{{ $footer->hotline }}</a>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('view/style/uploads/2022/12/mail.png') }}"
                                        alt="icon contact">
                                    <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="f-menu">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="item">
                                        <ul>
                                            <li><a href="">Trang chủ</a></li>
                                            <li><a href="">Quan hệ cổ đồng</a></li>
                                            <li><a href="">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="item">
                                        <ul>
                                            <li><a href="">Giới thiệu</a></li>
                                            <li><a href="">Tuyển dụng, Mời thầu</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-xl-7">
                    </div>
                    <div class="col-xl-5">
                        <div class="right">
                            <span>Copyright (c) 2018 Công ty Cổ Phần Máy &#8211; Thiết Bị Dầu Khí Đà Nẵng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
