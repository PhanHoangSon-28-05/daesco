<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="CWelcome to DAESCO Website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:locale:alternate" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Welcome to DAESCO Website" />
    <meta property="og:description" content="CWelcome to DAESCO Website" />
    <meta property="og:site_name" content="Welcome to DAESCO Website" />
    <script src="{{ URL::asset('view/style/js/window.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/style.css') }}">
    <link rel='stylesheet' id='parent-style-css' href='{{ URL::asset('view/style/themes/wecangroup/style.css') }}'
        media='all' />
    <link rel='stylesheet' id='slick-css'
        href='{{ URL::asset('view/style/themes/wecangroup-child/dist/lib/slick/slick.css') }}' media='all' />
    <link rel='stylesheet' id='aos-css' href='{{ URL::asset('view/style/themes/wecangroup-child/dist/css/aos.css') }}'
        media='all' />
    <link rel='stylesheet' id='style-css'
        href='{{ URL::asset('view/style/themes/wecangroup-child/dist/css/style.css') }}' media='all' />
    <link rel='stylesheet' id='wecangroup-style-css'
        href='{{ URL::asset('view/style/themes/wecangroup-child/style.css') }}' media='all' />
    <script src='{{ URL::asset('view/style/js/jquery/jquery.min.js') }}' id='jquery-core-js'></script>
    <script src='{{ URL::asset('view/style/js/jquery/jquery-migrate.min.js') }}' id='jquery-migrate-js'></script>
    <script src='{{ URL::asset('view/style/themes/wecangroup-child/dist/lib/slick/slick.min.js') }}' id='slick-js'></script>
    <script src='{{ URL::asset('view/style/themes/wecangroup-child/dist/js/aos.js') }}' id='aos-js'></script>
    <script src='{{ URL::asset('view/style/themes/wecangroup-child/dist/js/custom.js') }}' id='custom-js'></script>
    <link rel="icon" href="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" sizes="192x192" />
    <meta name="msapplication-TileImage" content="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @yield('style')
</head>

<body
    class="home page-template page-template-template-parts page-template-content-index page-template-template-partscontent-index-php page page-id-7 ">
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">Skip to content</a>

        <link rel="stylesheet" href="{{ URL::asset('view/style/css/bnt.css') }}">

        <div id="main-wrapper">
            <!-- Header -->
            @include('view.header')

            <!-- Content -->
            @yield('content')

            <script src="{{ URL::asset('view/style/js/javascrisp.js') }}"></script>

        </div><!--end-main-wrapper-->

        <!-- Footer -->
        @include('view.footer')

        <!-- Social Cetwork -->
        @include('view.social-cerwork')


        <script src='{{ URL::asset('view/style/plugins/contact-form-7/includes/swv/js/index.js') }}' id='swv-js'></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>

</body>

</html>
