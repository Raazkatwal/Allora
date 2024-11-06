<div class="wrapper">
    <div class="product-grid-heading">All Products</div>

    <div class="sort-option">
        <label for="sort" class="sort">Sort by:</label>
        <select name="sort" id="sort" class="sort">
            <option value="">Default sorting</option>
            <option value="low_to_high">Price: Low to High</option>
            <option value="high_to_low">Price: High to Low</option>
        </select>
    </div>

    <div class="filters-wrapper">
        <h1 class="filters-heading">Filters</h1>
        <div class="price-range-container">
            <label for="price">Price</label>
            <div class="price-inputs">
                <input type="number" id="min-price" class="min-input" min={{$min}} max={{$max}} value={{$min}}>
                <span>to</span>
                <input type="number" id="max-price" class="max-input" min={{$min}} max={{$max}} value={{$max}}>
            </div>
            <div class="slider-container">
                <div class="price-slider"></div>
                <input type="range" id="min-range" class="range-input" min={{$min}} max={{$max}} value={{$min}} step="1">
                <input type="range" id="max-range" class="range-input" min={{$min}} max={{$max}} value={{$max}} step="1">
            </div>
            <button class="apply-btn">Apply</button>
        </div>
        <div class="categories-wrapper">
            <details open>
                <summary>Categories</summary>
                @foreach ($categories as $category)
                <div>
                    <input type="checkbox" name="categories[]" id = "{{$category->name}}" value="{{$category->id}}" wire:model="selectedCategories">
                    <label for="{{$category->name}}">{{$category->name}}</label>
                </div>
                @endforeach
            </details>
        </div>
    </div>

    <div class="all-product-grid">
        @foreach ($products as $product)
        <a href="{{ route('product', ['id' => $product->id]) }}">
            <div class="product-tile">
                <div class="product-img-container">
                    <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="product-tile-img">
                </div>
                <div class="product-tile-info">
                    <div class="product-tile-category"> {{ $product->category ? $product->category->name : '' }} </div>
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
        @endforeach
    </div>
</div>
