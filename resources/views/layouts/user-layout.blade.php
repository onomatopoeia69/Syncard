<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'ShopMate')</title>

    @yield('head-script')

</head>
<body class="@yield('body-class', '')">

    {{-- Sidebar --}}
    @include('partials.user.sidebar-user')


    {{-- Main content --}}
    <div id="mainContent" class="ml-64 transition-all duration-300">

        {{-- Navbar --}}
        @include('partials.user.navbar-user')

        {{-- Page content --}}
        @yield('content')

        {{-- Footer --}}
        @include('partials.user.footer-user')

    </div>


    @yield('body-script')

</body>

</html>


