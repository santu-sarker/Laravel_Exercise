<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('page_title' ,'Page_Title')</title>

    <!-- Styles -->


    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    {{-- custom css file includes here --}}
    @yield('css-scripts')



    <!-- Fonts -->
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    {{-- main container section start --}}
    <div class="container-fluid p-0 wrapper" id="app">
        {{-- navigation section start --}}
        @yield('navbar')
        {{-- navigation section end --}}
        {{-- main content section start here --}}
        <div class="main_content">
            @yield('main_content')
        </div>
        {{-- footer section start --}}
        @yield('footer')
        {{-- footer section end --}}
        {{-- main content section end here --}}
    </div>
    {{-- main container section end --}}
    @yield('modals')
    {{-- js scripts section --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    @yield('js-scripts')
</body>

</html>
