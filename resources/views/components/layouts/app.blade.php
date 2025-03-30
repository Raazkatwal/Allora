<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your best Fashion store">
        @vite('resources/css/app.css')
        <title>{{ $title ?? env('APP_NAME') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
        @livewireStyles
        @stack('css')
        {{-- @fluxAppearance --}}
    </head>
    <body class="font-poppins">
        <div wire:ignore>
            @livewire('NavBar')
        </div>
        {{ $slot }}
        @livewire('footer')
        @stack('js')
        @fluxScripts
        @livewireScripts
    </body>
</html>
