@extends('layouts.mainlayout')
@push('links')
    @vite('resources/css/app.css')
@endpush
@section('content')
    <div class="w-screen h-[15rem] bg-blue-600 -translate-x-20"></div>
    <div class="flex justify-between">
        <div class="flex gap-10 items-center">
            <img src="{{ asset('img/men.jpg') }}" alt="Profile Picture" class="w-60 h-60 object-cover outline outline-4 outline-white rounded-full -translate-y-1/2">
            <div class="-translate-y-10">
                <h1 class="text-3xl"> {{$user->username}} </h1>
                <div class="text-xl text-gray-400 font-thin">
                    <i class="fa-solid fa-location-dot"></i> Biratnagar
                </div>
            </div>
        </div>
        <a href="/">
            <button class="mt-5 w-max px-8 h-[4.5rem] bg-secondary text-primary text-[1.4rem] font-bold rounded-[0.5rem] border-none outline-none cursor-pointer">
                <i class="fa-solid fa-shopping-cart"></i> Continue Shopping
            </button>
        </a>
        
    </div>
@endsection