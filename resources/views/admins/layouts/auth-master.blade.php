<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin</title>
    <link rel="icon" href="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ URL::asset('view/style/images/inc/logo-dsco.png') }}" sizes="192x192" />
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('admins/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('admins/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ URL::asset('admins/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ URL::asset('admins/assets/js/app.js') }}"></script>
    <!-- /theme JS files -->

    <link rel="stylesheet" href="{{ asset('admins/custom.css') }}">
</head>

<body class="text-center">

    <main class="form-signin">

        @yield('content')

    </main>


</body>

</html>
