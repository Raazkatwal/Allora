@extends('layouts.mainlayout')
@push('links')
    <link rel="stylesheet" href= {{ asset('css/allproducts.css') }} >
@endpush
@section('content')
<div class="wrapper">
    <div class="product-grid-heading">All Products</div>

    <form class="filters-wrapper" method="GET" action="{{ route('filterproducts') }}">
        <h1 class="filters-heading">Filters</h1>
        <button type="submit" class="apply-btn">Apply</button>

        <div class="sort-option">
            <label for="sort" class="sort">Sort by:</label>
            <select name="sort" id="sort" class="sort">
                <option value="">Default sorting</option>
                <option value="low_to_high" {{ request('sort') === 'low_to_high' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="high_to_low" {{ request('sort') === 'high_to_low' ? 'selected' : '' }}>Price: High to Low</option>
            </select>
        </div>

        <div class="price-range-container">
            <label for="price">Price</label>
            <div class="price-inputs">
                <input type="number" id="min-price" name="min-price" class="min-input" min={{$min}} max={{$max}} value={{$min}}>
                <span>to</span>
                <input type="number" id="max-price" name="max-price" class="max-input" min={{$min}} max={{$max}} value={{$max}}>
            </div>
            <div class="slider-container">
                <div class="price-slider"></div>
                <input type="range" id="min-range" class="range-input" min={{$min}} max={{$max}} value={{$min}} step="1">
                <input type="range" id="max-range" class="range-input" min={{$min}} max={{$max}} value={{$max}} step="1">
            </div>
        </div>
        <div class="categories-wrapper">
            <details open>
                <summary>Categories</summary>
                @foreach ($categories as $category)
                <div>
                    <input type="checkbox" 
           name="categories[]" 
           id="{{ $category->name }}" 
           value="{{ $category->id }}" 
           {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
    <label for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
                @endforeach
                <div>
                </div>
            </details>
        </div>
        
    </form>

    <div class="all-product-grid">
        @forelse ($products as $product)
        <a href="{{ route('product', ['id' => $product->id]) }}">
            <div class="product-tile">
                <div class="product-img-container">
                    <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="product-tile-img">
                </div>
                <div class="product-tile-info">
                    <div class="product-tile-category"> {{ $product->category ? $product->category->name : 'uncategorized' }} </div>
                    <h2 class="product-tile-title">{{ $product->name }}</h2>
                    <div class="review-stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="product-cost">$ {{ $product->price }} </p>
                </div>
            </div>
        </a>
        @empty
            <h1>No Products Found</h1>
        @endforelse
    </div>
</div>

@endsection
@push('scripts')
<script>
    const minInput = document.querySelector(".min-input");
const maxInput = document.querySelector(".max-input");
const minRange = document.querySelector("#min-range");
const maxRange = document.querySelector("#max-range");
const priceSlider = document.querySelector(".price-slider");

// Define a minimum gap between the two values
const priceGap = 10;

// Update slider position and inputs when number inputs are changed
minInput.addEventListener("input", () => {
    let minVal = parseInt(minInput.value);
    let maxVal = parseInt(maxInput.value);

    if (minVal + priceGap > maxVal) {
        minVal = maxVal - priceGap;
    }
    minRange.value = minVal;
    updateSlider(minVal, maxVal);
});

maxInput.addEventListener("input", () => {
    let minVal = parseInt(minInput.value);
    let maxVal = parseInt(maxInput.value);

    if (maxVal - priceGap < minVal) {
        maxVal = minVal + priceGap;
    }
    maxRange.value = maxVal;
    updateSlider(minVal, maxVal);
});

// Update inputs and slider when range sliders are changed
minRange.addEventListener("input", () => {
    let minVal = parseInt(minRange.value);
    let maxVal = parseInt(maxRange.value);

    if (minVal + priceGap > maxVal) {
        minVal = maxVal - priceGap;
    }
    minInput.value = minVal;
    updateSlider(minVal, maxVal);
});

maxRange.addEventListener("input", () => {
    let minVal = parseInt(minRange.value);
    let maxVal = parseInt(maxRange.value);

    if (maxVal - priceGap < minVal) {
        maxVal = minVal + priceGap;
    }
    maxInput.value = maxVal;
    updateSlider(minVal, maxVal);
});

// Function to update the slider fill area
function updateSlider(min, max) {
    priceSlider.style.left = (min / maxRange.max) * 100 + "%";
    priceSlider.style.right = 100 - (max / maxRange.max) * 100 + "%";
}

// Initialize slider position
updateSlider(parseInt(minRange.value), parseInt(maxRange.value));

</script>
@endpush