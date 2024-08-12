<header id="header" class="header">
    <div class="header-inner header-desktop">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1 class="site-title"><a href="/" rel="home">
                            <picture><img src="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" alt="">
                            </picture>
                        </a></h1>
                </div>
                <div class="nav-right">
                    <div class="top">
                        <div class="list">
                            <div class="item">
                                <ul>
                                    <li>
                                        <a target="_blank" href="{{ $header->facebook }}"><i
                                                class="fab fa-facebook-square"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $header->instagram }}"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $header->youtube }}"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<{{ $header->linkedin }}"><i
                                                class="fab fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <a href="mailto:{{ $header->email }}" class="contact-top"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M11.333 2.3335H4.66634C2.66634 2.3335 1.33301 3.3335 1.33301 5.66683V10.3335C1.33301 12.6668 2.66634 13.6668 4.66634 13.6668H11.333C13.333 13.6668 14.6663 12.6668 14.6663 10.3335V5.66683C14.6663 3.3335 13.333 2.3335 11.333 2.3335ZM11.6463 6.3935L9.55968 8.06016C9.11967 8.4135 8.55967 8.58683 7.99967 8.58683C7.43967 8.58683 6.87301 8.4135 6.43967 8.06016L4.35301 6.3935C4.13967 6.22016 4.10634 5.90016 4.27301 5.68683C4.44634 5.4735 4.75967 5.4335 4.97301 5.60683L7.05967 7.2735C7.56634 7.68016 8.42634 7.68016 8.93301 7.2735L11.0197 5.60683C11.233 5.4335 11.553 5.46683 11.7197 5.68683C11.893 5.90016 11.8597 6.22016 11.6463 6.3935Z"
                                        fill="#224085" />
                                </svg>{{ $header->email }}</a> <a href="tel:{{ $header->hotline }}"
                                class="contact-top"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M14.6463 12.2202C14.6463 12.4602 14.593 12.7068 14.4797 12.9468C14.3663 13.1868 14.2197 13.4135 14.0263 13.6268C13.6997 13.9868 13.3397 14.2468 12.933 14.4135C12.533 14.5802 12.0997 14.6668 11.633 14.6668C10.953 14.6668 10.2263 14.5068 9.45968 14.1802C8.69301 13.8535 7.92634 13.4135 7.16634 12.8602C6.39968 12.3002 5.67301 11.6802 4.97968 10.9935C4.29301 10.3002 3.67301 9.5735 3.11967 8.8135C2.57301 8.0535 2.13301 7.2935 1.81301 6.54016C1.49301 5.78016 1.33301 5.0535 1.33301 4.36016C1.33301 3.90683 1.41301 3.4735 1.57301 3.0735C1.73301 2.66683 1.98634 2.2935 2.33967 1.96016C2.76634 1.54016 3.23301 1.3335 3.72634 1.3335C3.91301 1.3335 4.09968 1.3735 4.26634 1.4535C4.43968 1.5335 4.59301 1.6535 4.71301 1.82683L6.25968 4.00683C6.37968 4.1735 6.46634 4.32683 6.52634 4.4735C6.58634 4.6135 6.61968 4.7535 6.61968 4.88016C6.61968 5.04016 6.57301 5.20016 6.47968 5.3535C6.39301 5.50683 6.26634 5.66683 6.10634 5.82683L5.59968 6.3535C5.52634 6.42683 5.49301 6.5135 5.49301 6.62016C5.49301 6.6735 5.49968 6.72016 5.51301 6.7735C5.53301 6.82683 5.55301 6.86683 5.56634 6.90683C5.68634 7.12683 5.89301 7.4135 6.18634 7.76016C6.48634 8.10683 6.80634 8.46016 7.15301 8.8135C7.51301 9.16683 7.85968 9.4935 8.21301 9.7935C8.55968 10.0868 8.84634 10.2868 9.07301 10.4068C9.10634 10.4202 9.14634 10.4402 9.19301 10.4602C9.24634 10.4802 9.29968 10.4868 9.35968 10.4868C9.47301 10.4868 9.55968 10.4468 9.63301 10.3735L10.1397 9.8735C10.3063 9.70683 10.4663 9.58016 10.6197 9.50016C10.773 9.40683 10.9263 9.36016 11.093 9.36016C11.2197 9.36016 11.353 9.38683 11.4997 9.44683C11.6463 9.50683 11.7997 9.5935 11.9663 9.70683L14.173 11.2735C14.3463 11.3935 14.4663 11.5335 14.5397 11.7002C14.6063 11.8668 14.6463 12.0335 14.6463 12.2202Z"
                                        fill="#224085" />
                                </svg>{{ $header->hotline }}</a>
                        </div>
                        <div class="nav-bar">
                            <div class="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <div class="button-search">
                                    <span>Tìm kiếm</span>
                                </div>
                                <div class="drop-search">
                                    <form role="search" method="get" id="searchform" class="pv__search"
                                        action="">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="sr-only" for="myInput">Tìm kiếm</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" id="myInput"
                                                        placeholder="Tìm kiếm" onkeyup="filterFunction()">
                                                    <div class="input-group-prepend input-group-text bg-primary">
                                                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="content col-12" id="myDropdown">
                                                @foreach ($cateSearchPro as $cate)
                                                    @foreach ($cate->prod as $value)
                                                        <a href="{{ $value->links }}">{{ $value->title_vi }}</a>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($cateSearchPosts as $value)
                                                    @if ($value->category && $value->category->slug != null)
                                                        <a
                                                            href="{{ URL::route('datile.news', [$value->category->slug, $value->slug]) }}">
                                                            {{ $value->name_vi }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="mega-menu">
                            <ul class="drop-lv-1">
                                @foreach ($cates as $cate)
                                    <li class="link-lv-1 w-auto">
                                        <div class="m-link-1">
                                            <a
                                                href="
                                                @if (in_array($cate->slug, ['field-of-activity'])) @elseif (in_array($cate->slug, ['shareholders'])){{ URL::route(\App\Models\View::PAGE_CATE_PRO, $cate->slug) }}
                                                @else
                                                 {{ route(strtolower($cate->name_en)) }} @endif ">{{ $cate->name_vi }}</a>
                                            @include('view.partials.category-check', [
                                                'parentId' => $cate->id,
                                            ])
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-mobi">
        <div class="mobi-bar">
            <div class="mobi-logo"><a href="index.html" rel="home">
                    <figure><img src="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" alt="logo">
                    </figure>
                </a></div>
            <button class="open-menu"><i class="fa fa-bars"></i></button>
        </div>
        <div class="menu-sidebar">
            <div class="side-top">
                <button class="close-menu"><i class="fa fa-times"></i></button>
                <!-- <div class="search-mobi">
                    <input type="text" placeholder="Search...."><button><i class="far fa-search"></i></button>
                </div> -->
                <form role="search" method="get" id="searchform" class="search-mobi" action="">
                    <input type="search" placeholder="Tìm kiếm" value="" name="s" id="s" />
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="drop-menu-mobi">
                <ul class="menu-mobi">
                    @foreach ($cates as $cate)
                        <li class="">
                            <a
                                href="
                                @if (in_array($cate->name_en, ['Home', 'Introduce', 'Recruitment', 'Contact'])) {{ route(strtolower($cate->name_en)) }}
                                @else @endif ">{{ $cate->name_vi }}
                                @include('view.partials.category-mobie', [
                                    'parentId' => $cate->id,
                                ])
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="side-bottom">
                <div class="side-social">
                    <ul>
                        <li>
                            <a target="_blank" href="{{ $header->facebook }}"><i
                                    class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $header->instagram }}"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $header->youtube }}"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="<{{ $header->linkedin }}"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="side-contact">
                    <a href="mailto:{{ $header->email }}" class="contact-top"><i
                            class="fal fa-envelope"></i>{{ $header->email }}</a> <a
                        href="tel:{{ $header->hotline }}" class="contact-top"><i
                            class="fal fa-envelope"></i>{{ $header->hotline }}</a>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</header>
<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        const a = document.getElementById("myDropdown").getElementsByTagName("a");
        for (let i = 0; i < a.length; i++) {
            a[i].style.display = "none";
        }
    }

    function filterFunction() {
        const input = document.getElementById("myInput");
        const filter = input.value.toUpperCase();
        const div = document.getElementById("myDropdown");
        const a = div.getElementsByTagName("a");
        for (let i = 0; i < a.length; i++) {
            const txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "block";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
