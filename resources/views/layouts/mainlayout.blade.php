<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalabe=no">
    <title>Allora | @yield('title', 'Your Best Fashion Store')</title>
    @stack('links')
</head>
<body>
    @include('layouts.navbar')
    @yield('swiper')
    <main class="main-content">
        @yield('content')
    </main>
    @include('layouts.footer')
    @stack('scripts')
</body>
</html>