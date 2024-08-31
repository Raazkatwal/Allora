@extends('layouts.mainlayout')
@push('links')
<link rel="stylesheet" href={{ asset('/css/product.css') }}>
@endpush
@section('content')
<div class="main-product-section">
    <div class="productinfo-section">
        <div class="image-gallery">
            <h1>Your image here</h1>
        </div>
        <div class="product-info">
            <h1 class="product-heading">Asus Juj Bag</h1>
            <h2 class="product-price">$121.00</h2>
            <div class="review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis saepe laudantium,
                ducimus consequuntur qui, inventore hic ipsa velit dolorum, voluptates nobis suscipit laborum adipisci
                debitis?</p>
            <div class="cart-section">
                <div class="quantity">
                    <button class="quantity-input-btn">-</button>
                    <input type="number" class="quantity-input" min="1" value="1" oninput="validity.valid||(value='');">
                    <button class="quantity-input-btn">+</button>
                    <button class="cart-btn"><i class="fa-solid fa-bag-shopping"></i> Add to cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-products-section">
    <h1 class="product-heading related-products-heading">Related Products</h1>
    <div class="product-grid">
        @for ($i=0; $i < 5; $i++) 
        <a href={{ route('product', ['id'=>$i]) }} >
            <div class='product-tile'>
                <img src={{ $i%2==0 ? asset("img/bag-1-front.jpg") : asset("img/bag-2-front.jpg")}} alt='Bag 1' class='slider-product-img'>
                <div class='slider-product-info'>
                    <h2 class='slider-product-title'>
                        {{ $i%2==0 ? "Fashion Overnight Bag" : "Men's Fashion Bag"}}
                    </h2>
                    <p class='product-cost'>$ 200</p>
                </div>
            </div>
            </a>
        @endfor
    </div>
</div>
@endsection