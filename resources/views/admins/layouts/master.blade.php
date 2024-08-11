<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" sizes="192x192" />
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('admins/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('admins/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ URL::asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <!-- /fontawesome -->

    <!-- Core JS files -->
    <script src="{{ URL::asset('admins/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ URL::asset('admins/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('admins/assets/js/app.js') }}"></script>

    <script src="{{ URL::asset('admins/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/lines.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('admins/custom.css') }}">
    <!-- /theme JS files -->
    @yield('style')

    @livewireStyles

    @stack('style')
</head>

<body>

    <!-- Main navbar -->
    @include('admins.layouts.navbar')
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            @include('admins.layouts.sidebar')
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">
                @yield('content')
            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    @livewireScripts
    <script src="{{ Url::asset('admins/search/search.js') }}"></script>
    @yield('script')
    @stack('script')
</body>

</html>
