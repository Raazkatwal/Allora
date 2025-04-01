<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your best Fashion store">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $title ?? env('APP_NAME') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
        @livewireStyles
        @stack('css')
        {{-- @fluxAppearance --}}
    </head>
    <body class="font-poppins">
        <div class="grid grid-cols-[18%_82%] grid-rows-[10%_90%]">
            <div wire:ignore class="row-span-2">
                @livewire('AdminNavBar')
            </div>
            <nav class="size-full flex items-center justify-between p-4 bg-white border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Welcome Back, {{ Auth::user()->username }}!</h2>
                <div class="relative">
                    <div class="size-10 bg-gradient-to-br from-emerald-500 to-teal-500 text-white font-medium grid place-items-center rounded-full cursor-pointer select-none hover:shadow-lg transition-shadow duration-200">
                        {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                    </div>
                </div>
            </nav>
            {{ $slot }}
        </div>
        @livewireScripts
        @stack('js')
        @fluxScripts
    </body>
</html>
