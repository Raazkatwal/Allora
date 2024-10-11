@extends('layouts.mainlayout')
@push('links')
@include('layouts.links')
@endpush
@push('scripts')
<script src={{ asset('js/script.js') }}></script>
@endpush
@section('swiper')
<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url(img/slide1.jpg);">
            <div class="slider1-text">
                <h1 class="slider-title">
                    <div class="diff-color-title">Christmastide</div>Fashion Collection
                </h1>
                <p class="slider-des">Get Free Shipping on all order over $75</p>
                <a href="#"><button class="slider-btn">Shop now</button></a>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url(img/slide2.jpg);">
            <div class="slider2-text">
                <h1 class="slider-title"><span class="diff-color-title">New arrivals</span><br>Fashion Collection</h1>
                <p class="slider-des">Get Free Shipping on all orders over $75</p>
                <a href="#"><button class="slider-btn">Shop now</button></a>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
@endsection
@section('content')
<div class="categories">
    <a href="#" class="category-tile men-tile">
        <h1 class="category-title">For Men's</h1>
        <h3 class="category-link">Shop now<i class="fa-solid fa-arrow-right"></i></h3>
    </a>
    <a class="category-tile sale-tile">
        <h1 class="category-title">For Sale</h1>
        <h3 class="category-link">Shop now at 99% discount <i class="fa-solid fa-arrow-right"></i></h3>
    </a>
    <a href="#" class="category-tile women-tile">
        <h1 class="category-title">For Women's</h1>
        <h3 class="category-link">Shop now <i class="fa-solid fa-arrow-right"></i></h3>
    </a>
</div>
<h1 class="product-grid-heading">Shop bags</h1>
<div class="product-grid">
    @php
    $bags = $products->filter(function ($product){
    return $product->category && strtolower($product->category->name) == 'bags';
    })->take(10);
    $shoes = $products->filter(function ($product){
    return $product->category && strtolower($product->category->name) == 'shoes';
    })->take(10);
    @endphp
    @foreach ($bags as $product)
    <a href= {{ route('product', ['id'=> $product->id]) }} >
        <div class='product-tile'>
            <div class="product-img-container">
                <img src={{ asset('storage/' . $product->images->first()->path) }} alt={{$product->name}} class='product-tile-img'>
            </div>
            <div class='product-tile-info'>
                <div class="product-tile-category"> {{ $product->category->name }} </div>
                <h2 class='product-tile-title'>{{ $product->name }}</h2>
                <div class="review-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class='product-cost'>$ {{ $product->price }} </p>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="banner-section">
    <div class="banner" style="background-image: url(img/banner-1.jpg);">
        <div class="banner-content">
            <p class="banner-semi-title">New Arrivals</p>
            <h1 class="banner-title">Season Training Shoes</h1>
            <p class="banner-product-cost">Only from <span style="color: var(--accent-color);">79.88$</span></p>
        </div>
    </div>
    <div class="banner" style="background-image: url(img/banner-2.jpg);">
        <div class="banner-content" style="color: white;">
            <p class="banner-semi-title">Top Product</p>
            <h1 class="banner-title">Suitable Women Wear</h1>
            <p class="banner-product-cost">Only from <span style="color: var(--accent-color);">79.88$</span></p>
        </div>
    </div>
</div>
<h1 class="product-grid-heading">Shop Shoes</h1>
<div class="product-grid">
    @foreach ($shoes as $product)
    <a href= {{ route('product', ['id'=> $product->id]) }} >
        <div class='product-tile'>
            <div class="product-img-container">
                <img src={{ asset('storage/' . $product->images->first()->path) }} alt={{$product->name}} class='product-tile-img'>
            </div>
            <div class='product-tile-info'>
                <div class="product-tile-category"> {{ $product->category->name }} </div>
                <h2 class='product-tile-title'>{{ $product->name }}</h2>
                <div class="review-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class='product-cost'>$ {{ $product->price }} </p>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection