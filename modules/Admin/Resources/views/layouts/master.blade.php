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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('modules/admin/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('modules/admin/css/icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('modules/admin/css/app.min.css') }}">

        @yield('styles')
    </head>
    <body id="body" class="@yield('body_class' , '')" style="@yield('body_style' , '')">
        @include('admin::components.header')
        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content-tab">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.view.dashboard') }}">{{ env("APP_NAME") }}</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item active">{{ trans("admin::messages.".Route::currentRouteName()) }}</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">{{ trans("admin::messages.".Route::currentRouteName()) }}</h4>
                            </div>
                            <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                    @yield('content')
                </div>
                @include('admin::components.footer')
            </div>
        </div>

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
        <script src="{{ asset('modules/admin/js/core/WDRequest.js') }}"></script>
        <script src="{{ asset('modules/admin/js/core/WDUtils.js') }}"></script>
        <script src="{{ asset('modules/admin/js/plugins/simplebar.min.js') }}"></script>
        <script src="{{ asset('modules/admin/js/plugins/feather.min.js') }}"></script>
        <script src="{{ asset('modules/admin/js/app.js') }}"></script>
    </body>
</html>
