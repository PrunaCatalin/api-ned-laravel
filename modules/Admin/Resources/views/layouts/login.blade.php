<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang :   str_replace('_', '-', app()->getLocale())  }}"  dir="ltr">
<head>
    <meta charset="@yield('meta-charset', 'UTF-8')">
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('description', 'Descriere implicită')">
    <meta name="keywords" content="@yield('keywords', 'Cuvinte cheie implicite')">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <meta rel="canonical" href="@yield('canonical', url(request()->path()))">
    <meta name="author" content="@yield('author', env('APP_AUTHOR'))">
    <meta name="viewport" content="@yield('viewport', 'width=device-width, initial-scale=1.0')">
    <link rel="stylesheet" href="{{ asset('modules/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/admin/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/admin/css/app.min.css') }}">
</head>
<body id="body" class="auth-page" style="background-image: url('{{ asset('modules/admin/images/p-1.png') }}'); background-size: cover; background-position: center center;">
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="{{ asset('modules/admin/images/logo-sm.png') }}"
                                                 height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">
                                            Let's Get Started {{ env('APP_NAME') }}
                                        </h4>
                                        <p class="text-muted  mb-0">Sign in to continue to {{ env('APP_NAME') }}.</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">

                                    @if ($errors->has('login'))
                                        <div class="alert alert-danger border-0">
                                            {{ $errors->first('login') }}
                                        </div>
                                    @endif
                                    <form class="my-4" action="{{ route('admin.view.login') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                   name="email" placeholder="Enter email">
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                   id="userpassword" placeholder="Enter password">
                                        </div><!--end form-group-->

                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input"
                                                           type="checkbox" id="customSwitchSuccess" name="remember">
                                                    <label class="form-check-label"
                                                           for="customSwitchSuccess">Remember me</label>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-sm-6 text-end">
                                                <a href="{{ route('admin.view.reset-password') }}"
                                                   class="text-muted font-13">
                                                    <i class="dripicons-lock"></i> Forgot password?
                                                </a>
                                            </div><!--end col-->
                                        </div><!--end form-group-->
                                        <div class="form-group mt-2 d-flex justify-content-center">
                                            @if ($errors->has('g-recaptcha-response'))
                                                <div class="alert alert-danger border-0">{{ $errors->first('g-recaptcha-response') }}</div>
                                            @endif
                                            <div class="g-recaptcha"
                                                 data-sitekey="{{ env('GOOGLE_CAPTCHA_PUBLIC_KEY', $WDConfigGoogle->captha->site_key ) }}"
                                            >
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">
                                                        Log In <i class="fas fa-sign-in-alt ms-1"></i>
                                                    </button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <hr class="hr-dashed mt-4">
                                    <div class="text-center mt-n5">
                                        <h6 class="card-bg px-3 my-4 d-inline-block">Or Login With</h6>
                                    </div>
                                    <div class="d-flex justify-content-center mb-1">
                                        <a href class="d-flex justify-content-center align-items-center thumb-sm bg-soft-danger rounded-circle">
                                            <i class="fab fa-google align-self-center"></i>
                                        </a>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <script>
    var CURRENT_URL = '{{ url()->current() }}';
    </script>
    {{-- Laravel Vite - JS File --}}
    {{-- {{ module_vite('build-admin', 'Resources/assets/js/app.js') }} --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('modules/admin/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/core/WDAxios.js') }}"></script>
    <script src="{{ asset('modules/admin/js/core/WDCore.js') }}"></script>
    <script src="{{ asset('modules/admin/js/core/WDLoader.js') }}"></script>
    <script src="{{ asset('modules/admin/js/core/WDLog.js') }}"></script>
    <script src="{{ asset('modules/admin/js/core/WDUtils.js') }}"></script>
    <script src="{{ asset('modules/admin/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/app.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
