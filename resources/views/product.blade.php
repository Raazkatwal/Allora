@extends('layouts.mainlayout')
@push('links')
<link rel="stylesheet" href={{ asset('/css/product.css') }}>
@endpush
@section('content')
<div class="main-product-section">
    <div class="productinfo-section">
        <div class="image-gallery">
            <div class="image-scroller">
                @foreach ($product->images as $image)
                <img src={{ asset('storage/' . $image->path) }} class="scroller-content" title="Image">
                @endforeach
            </div>
            <div class="image-display"><img alt="Main Image" class="zoom-image"></div>
        </div>
        <div class="product-info">
            <h1 class="product-heading">{{ $product->name }}</h1>
            <h2 class="product-price">$ {{ $product->price }} </h2>
            <div class="review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="description"> {{ $product->description }} </p>
            <div class="cart-section">
                <div class="quantity">
                    <button class="quantity-input-btn dec-quantity">-</button>
                    <input type="number" class="quantity-input total-quantity" min="1" value="1"
                        oninput="validity.valid||(value='');">
                    <button class="quantity-input-btn inc-quantity">+</button>
                    @if (Auth::guest())
                    <a href="{{ route('login') }}"><button class="cart-btn"><i class="fa-solid fa-bag-shopping"></i> Add to cart</a></button>
                    @else
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantity" value="1">
                        <button type="submit" class="cart-btn"><i class="fa-solid fa-bag-shopping"></i> Add to cart</button>
                    </form>
                    @endif

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-products-section">
    <h1 class="product-heading related-products-heading">Related Products</h1>
    <div class="product-grid">
        @for ($i=0; $i < 5; $i++) <a href={{ route('product', ['id'=>$i]) }} >
            <div class='product-tile'>
                <img src={{ $i%2==0 ? asset("img/bag-1-front.jpg") : asset("img/bag-2-front.jpg")}} alt='Bag 1'
                    class='slider-product-img'>
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