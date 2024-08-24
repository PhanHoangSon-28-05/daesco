@inject('footerRepos', 'App\Repositories\Footers\FooterRepositoryInterface')

@extends('view.index')
@section('title', $recruit->title_vi)
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
                            <div class="detail-recuit">
                                <h2>{{ $recruit->title_vi }}</h2>
                                <div class="content-detail">
                                    {!! $recruit->content_vi !!}
                                    <button type="button" data-toggle="modal" data-target="#applicationModal">Ứng tuyển</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-right">
                            <div class="right-item info-work">
                                <h2>Thông tin công việc</h2>
                                <ul>
                                    <li>
                                        <strong>Lương:</strong>
                                        <p>{{ $recruit->salary ?? '' }} 
                                            {{ gettype($recruit->salary) == 'integer' ? 'VNĐ' : ''}}</p>
                                    </li>
                                    <li>
                                        <strong>Ngày hết hạn:</strong>
                                        <p>{{ Carbon\Carbon::parse($recruit->expired_at ?? '1-1-1999')->format('d/m/Y') }}</p>
                                    </li>
                                    <li>
                                        <strong>Vị trí:</strong>
                                        <p>{{ $recruit->position_vi ?? '' }}</p>
                                    </li>
                                    <li>
                                        <strong>Số lượng:</strong>
                                        <p>{{ $recruit->amount ?? '' }}</p>
                                    </li>
                                    <li>
                                        <strong>Địa chỉ:</strong>
                                        <p>{{ $footerRepos->getFooter()->first()->address }}</p>
                                    </li>
                                </ul>
                            </div>

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

    <div class="form-recuit modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg pt-1" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="#!">
                        <div class="row mb-2">
                            <div class="col">
                                <span>
                                    Vui lòng điền vào mẫu đơn tương ứng dưới đây. 
                                    Sau đó upload file thông tin ứng tuyển theo 
                                    mẫu sau và nhấn Hoàn thành để nộp hồ sơ
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="label">Họ và tên <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <label class="label">Số điện thoại <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="fullname" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="label">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <label class="label">Địa chỉ <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="upload-file">
                                    <div class="file-up">
                                        <div id="file-input-button-x" class="file-input-button" data-id="x">
                                            <div class="text-file">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M18.4206 8.2199C17.8096 6.8159 16.7551 5.65097 
                                                    15.4187 4.90362C14.0823 4.15627 12.5377 3.86773 11.0216 
                                                    4.0822C9.5055 4.29668 8.10155 5.00235 7.02488 6.09107C5.94821 
                                                    7.17979 5.25821 8.59151 5.06062 10.1099C4.10721 10.3382 
                                                    3.27084 10.9087 2.71036 11.7131C2.14988 12.5174 1.90431 
                                                    13.4996 2.02029 14.4731C2.13627 15.4466 2.60572 16.3436 
                                                    3.33949 16.9938C4.07326 17.6439 5.02025 18.002 6.00062 
                                                    17.9999C6.26584 17.9999 6.52019 17.8945 6.70773 17.707C6.89527 
                                                    17.5195 7.00062 17.2651 7.00062 16.9999C7.00062 16.7347 6.89527 
                                                    16.4803 6.70773 16.2928C6.52019 16.1053 6.26584 15.9999 6.00062 
                                                    15.9999C5.47019 15.9999 4.96148 15.7892 4.58641 15.4141C4.21134 
                                                    15.039 4.00062 14.5303 4.00062 13.9999C4.00062 13.4695 4.21134 
                                                    12.9608 4.58641 12.5857C4.96148 12.2106 5.47019 11.9999 6.00062 
                                                    11.9999C6.26584 11.9999 6.52019 11.8945 6.70773 11.707C6.89527 
                                                    11.5195 7.00062 11.2651 7.00062 10.9999C7.00318 9.81717 7.42491 
                                                    8.67365 8.19089 7.77248C8.95688 6.87131 10.0175 6.27085 11.1844 
                                                    6.07777C12.3512 5.88469 13.5488 6.1115 14.5642 6.7179C15.5796 
                                                    7.32431 16.3472 8.27104 16.7306 9.3899C16.7878 9.56174 16.8905 
                                                    9.71483 17.0279 9.83283C17.1653 9.95083 17.3321 10.0293 17.5106 
                                                    10.0599C18.1767 10.1858 18.7805 10.5335 19.2236 11.0464C19.6668 
                                                    11.5594 19.9232 12.2073 19.951 12.8845C19.9789 13.5618 19.7765 
                                                    14.2286 19.3769 14.7761C18.9774 15.3237 18.4041 15.7198 17.7506 
                                                    15.8999C17.4934 15.9662 17.273 16.132 17.138 16.3608C17.0029 
                                                    16.5896 16.9643 16.8626 17.0306 17.1199C17.0969 17.3772 17.2627 
                                                    17.5975 17.4915 17.7326C17.7203 17.8676 17.9934 17.9062 18.2506 
                                                    17.8399C19.303 17.5618 20.2359 16.9479 20.9076 16.0914C21.5794 
                                                    15.2348 21.9532 14.1825 21.9725 13.0942C21.9917 12.0058 21.6552 
                                                    10.9409 21.0142 10.0612C20.3731 9.18149 19.4625 8.53499 18.4206 
                                                    8.2199ZM12.7106 10.2899C12.6155 10.1989 12.5034 10.1275 12.3806 
                                                    10.0799C12.1372 9.97988 11.8641 9.97988 11.6206 10.0799C11.4979 
                                                    10.1275 11.3857 10.1989 11.2906 10.2899L8.29062 13.2899C8.10232 
                                                    13.4782 7.99653 13.7336 7.99653 13.9999C7.99653 14.2662 8.10232 
                                                    14.5216 8.29062 14.7099C8.47893 14.8982 8.73432 15.004 9.00062 
                                                    15.004C9.26692 15.004 9.52232 14.8982 9.71062 14.7099L11.0006 
                                                    13.4099V18.9999C11.0006 19.2651 11.106 19.5195 11.2935 19.707C11.4811 
                                                    19.8945 11.7354 19.9999 12.0006 19.9999C12.2658 19.9999 12.5202 
                                                    19.8945 12.7077 19.707C12.8953 19.5195 13.0006 19.2651 13.0006 
                                                    18.9999V13.4099L14.2906 14.7099C14.3836 14.8036 14.4942 14.878 
                                                    14.616 14.9288C14.7379 14.9796 14.8686 15.0057 15.0006 15.0057C15.1326 
                                                    15.0057 15.2633 14.9796 15.3852 14.9288C15.5071 14.878 15.6177 
                                                    14.8036 15.7106 14.7099C15.8044 14.6169 15.8787 14.5063 15.9295 
                                                    14.3845C15.9803 14.2626 16.0064 14.1319 16.0064 13.9999C16.0064 
                                                    13.8679 15.9803 13.7372 15.9295 13.6153C15.8787 13.4935 15.8044 
                                                    13.3829 15.7106 13.2899L12.7106 10.2899Z" fill="#224085"></path>
                                                </svg>
                                                <strong>Tải lên hoặc thả tệp <span>sơ yếu lý lịch của bạn vào đây</span></strong>
                                            </div>
                                        </div>
                                        <input id="file-input-x" class="file-input visually-hidden" hidden type="file" name="file-input-x" data-id="x" accept=".doc,.docx,.pdf">
                                    </div>
                                <div id="file-list-x" class="title-file"><p></p></div>
                                </div>
                            </div>
                        </div>

                        <button type="button">Gửi ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
