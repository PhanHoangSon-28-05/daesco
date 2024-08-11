@extends('admins.layouts.auth-master')

@section('content')
    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-light navbar-static">
        <div class="navbar-brand ml-2 ml-lg-0 p-0">
            <img src="{{ URL::asset('images/inc/logo-dsco.png') }}" alt="">
        </div>

        <div class="d-flex justify-content-end align-items-center ml-auto">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link">
                        <i class="icon-lifebuoy"></i>
                        <span class="d-none d-lg-inline-block ml-2">Support</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link">
                        <i class="icon-user-lock"></i>
                        <span class="d-none d-lg-inline-block ml-2">Login</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    <!-- Login form -->
                    <form method="post" action="{{ route('login.perform') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i
                                        class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                        placeholder="Email or Username" name="email" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" name="password"
                                        value="{{ old('password') }}" placeholder="Password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
@endsection
