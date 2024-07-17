@extends('layouts.mainlayout')
@push('links')
@include('layouts.links')
<style>
    .container{
        min-height: 100vh;
        display: grid;
        place-items: center;
        text-align: center;
    }
    .heading{
        font-size: 5rem;
    }
    .texts{
        font-size: 2rem;
        font-weight: 600;
        margin: 1rem 0;
    }
    .home-btn{
        width: 12rem;
        height: 4rem;
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--text-color);
        background-color: var(--accent-color);
        border: none;
        outline: none;
        border-radius: .3rem;
        cursor: pointer;
    }
</style>
@endpush
@section('title', '404 Not Found')
@section('content')
<div class="container">
    <div>
        <h1 class="heading">Error 404</h1>
        <img src="img/404.png" alt="error 404">
        <p class="texts">OOPS! THAT PAGE CAN'T BE FOUND</p>
        <a href={{ route('index') }}>
            <button class="home-btn">Go Home</button>
        </a>
    </div>
</div>
@endsection