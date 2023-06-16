<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang :   str_replace('_', '-', app()->getLocale())  }}" data-mode="light">
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
        <link rel="stylesheet" href="{{ asset('modules/fresciastore/css/fontawesome/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('modules/fresciastore/css/bootstrap/bootstrap.min.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('modules/fresciastore/css/style.min.css') }}">

        @yield('styles')
    </head>
    <body>
        @include('fresciastore::header')
            <main class="main-content">
                @yield('content')
            </main>
        @include('fresciastore::footer')
        <script>
            var APP_URL = '{{ route('home.page') }}';
            var SHOP_URL = '{{ route('shop.page') }}';
            var ADD_CART = '{{ route('cart.add') }}';
            var CURRENT_URL = '{{ url()->current() }}';
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{ asset('modules/fresciastore/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/fontawesome/fontawesome.min.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/core/WDAxios.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/core/WDCore.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/core/WDLoader.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/core/WDLog.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/core/WDRequest.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/core/WDUtils.js') }}"></script>
        <script src="{{ asset('modules/fresciastore/js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
