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
                    <div class="row">
                        <div class="col-lg-8 col-left">
                            @if ($recruits->count() > 0)
                            @foreach ($recruits as $recruit)
                            <div class="list-recuit">
                                <div class="re-item">
                                    <div class="re-top">
                                        <div class="top-left">
                                            <h3>{{ $recruit->title_vi ?? '' }}</h3>
                                            <p>Nơi làm việc: {{ $recruit->workplace_vi ?? '' }}</p>
                                            <p>Vị trí: {{ $recruit->position_vi ?? '' }}</p>
                                            <p>Số lượng tuyển: {{ $recruit->amount }}</p>
                                            <p>Ứng viên đủ điều kiện và quan tâm đến vị trí tuyển dụng gửi hồ sơ
                                                scan qua email: 
                                                <a href="{{ $recruit->email ?? '#!' }}">{{ $recruit->email }}</a>
                                                <strong><em>trước ngày 
                                                {{ Carbon\Carbon::parse($recruit->expired_at ?? '1-1-1999')->format('d/m/Y') }}
                                                </em></strong>. 
                                                Sau khi kiểm tra hồ sơ đạt yêu cầu, Công ty sẽ liên hệ phỏng vấn. 
                                                Thời gian đi làm ngay sau khi được tuyển dụng.
                                            </p>
                                        </div>
                                        <div class="top-right">
                                            <span>Đang tuyển</span>
                                        </div>
                                    </div>
                                    <div class="re-bottom">
                                        <div class="bottom-left">
                                            <button>
                                                Ngày hết hạn: 
                                                {{ Carbon\Carbon::parse($recruit->expired_at ?? '1-1-1999')->format('d/m/Y') }}
                                            </button>
                                        </div>
                                        <div class="bottom-right">
                                            <a href="{{ URL::route('recruitment.detail', ['slugDetail' => $recruit->slug]) }}">
                                                <button>Chi tiết</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row">
                                <h1 class="w-100 text-center">(Không tìm thấy bài viết)</h1>
                            </div>
                            @endif
                            {!! $recruits->links() !!}
                        </div>
                        <div class="col-lg-4 col-right">
                            <div class="right-item nav-right">
                                @php($info = App\Models\Footer::first())
                                <h2>Thông tin</h2>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <figure><img src="{{ URL::asset('view/style/uploads/2023/07/phone-1.png') }}"
                                                    alt="icon contact"></figure>
                                            <span>{{ $info->hotline }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:thanhpvmdaesco@gmail.com">
                                            <figure><img src="{{ URL::asset('view/style/uploads/2023/07/mail-1.png') }}"
                                                    alt="icon contact"></figure>
                                            <span>{{ $info->email }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <figure><img src="{{ URL::asset('view/style/uploads/2023/07/map-4.png') }}"
                                                    alt="icon contact"></figure>
                                            <span>{{ $info->address }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
