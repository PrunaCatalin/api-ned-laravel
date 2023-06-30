<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang :   str_replace('_', '-', app()->getLocale())  }}" data-mode="light">
    <head>
        <meta charset="@yield('meta-charset', 'UTF-8')">
        <title>@yield('title', env('APP_NAME'))</title>
        <meta name="description" content="@yield('description', 'Descriere implicită')">
        <meta name="keywords" content="@yield('keywords', 'Cuvinte cheie implicite')">
        <meta name="robots" content="@yield('robots', 'index, follow')">
        <meta name="canonical" href="@yield('canonical', url(request()->path()))">
        <meta name="author" content="@yield('author', env('APP_AUTHOR'))">
        <meta name="viewport" content="@yield('viewport', 'width=device-width, initial-scale=1.0')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

        <!-- Favicons -->
        <link href="{{ asset('modules/nedcurier/img/favicon.png') }}" rel="icon" />
        <link href="{{ asset('modules/nedcurier/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
        />
        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link
            href="{{ asset('modules/nedcurier/css/components/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet"
        />
{{--        <link--}}
{{--            href="{{ asset('modules/nedcurier/css/components/bootstrap-icons/bootstrap-icons.min.css') }}"--}}
{{--            rel="stylesheet"--}}
{{--        />--}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
{{--        <link href="{{ asset('modules/nedcurier/fonts/bootstrap-icons.woff') }}" rel="application/font-woff" />--}}
{{--        <link href="{{ asset('modules/nedcurier/fonts/bootstrap-icons.woff2') }}" rel="application/font-woff" />--}}
        <link
            href="{{ asset('modules/nedcurier/css/components/glightbox/css/glightbox.min.css') }}"
            rel="stylesheet"
        />
        <link href="{{ asset('modules/nedcurier/css/components/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('modules/nedcurier/css/app.css') }}">
        {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-nedcurier', 'Resources/assets/sass/app.scss') }} --}}
{{--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">--}}
        @yield('styles')
    </head>
    <body>
        @include('nedcurier::components.header')
            @yield('content')
        @include('nedcurier::components.footer')

        <script>
            var APP_URL = '{{ route('page.homepage') }}';
            var CURRENT_URL = '{{ url()->current() }}';
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
        <script src="{{ asset('modules/nedcurier/js/core/WDAxios.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/core/WDCore.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/core/WDLoader.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/core/WDLog.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/core/WDRequest.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/core/WDUtils.js') }}"></script>

        <script src="{{ asset('modules/nedcurier/js/components/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/components/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/components/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/components/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/components/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/components/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('modules/nedcurier/js/app.js') }}"></script>
{{--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>--}}


        @yield('scripts')
        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-nedcurier', 'Resources/assets/js/app.js') }} --}}
    </body>
</html>
