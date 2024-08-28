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
                <h1 class="slider-title"><div class="diff-color-title">Christmastide</div>Fashion Collection</h1>
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
@for ($i=0; $i < 5; $i++)
    <a href= {{ route('product', ['id'=>$i]) }} >  
    <div class='product-tile'>
        <img src={{ asset("img/bag-1-front.jpg") }} alt='Bag 1' class='slider-product-img'>
        <div class='slider-product-info'>
            <h2 class='slider-product-title'>Fashion Overnight Bag</h2>
            <p class='product-cost'>$ 200</p>
        </div>
    </div>
    </a>
    <a href= {{ route('product', ['id'=>$i]) }} >
    <div class='product-tile'>
        <img src={{ asset("img/bag-2-front.jpg") }} alt='Bag 2' class='slider-product-img'>
        <div class='slider-product-info'>
            <h2 class='slider-product-title'>Men's Fashion Bag</h2>
            <p class='product-cost'>$ 150</p>
        </div>
    </div>
    </a>
@endfor
  
        
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
    @for ($i = 0; $i < 5; $i++)
        <a href= {{ route('product', ['id'=>$i]) }}>

            
            <div class='product-tile'>
                <img src='{{ asset("img/shoe-1.jpg") }}' alt='Shoe 1' class='slider-product-img'>
                <div class='slider-product-info'>
                    <h2 class='slider-product-title'>Beyond Sky shoes</h2>
                    <p class='product-cost'>$ 190</p>
                </div>
            </div>
        </a>
        <a href="">

            <div class='product-tile'>
                <img src='{{ asset("img/shoe-2.jpg") }}' alt='Shoe 2' class='slider-product-img'>
                <div class='slider-product-info'>
                    <h2 class='slider-product-title'>Roller Skate</h2>
                    <p class='product-cost'>$ 132,00</p> <!-- Note: Corrected the price format -->
                </div>
            </div>
        </a>
@endfor

        
</div>
@endsection