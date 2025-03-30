@php
    $product = [
    'name' => 'Classic Leather Jacket',
    'brand' => 'Urban Edge',
    'price' => 249.99,
    'original_price' => 299.99,
    'rating' => 4,
    'reviews' => 128,
    'image' => 'storage/images/S3e4kFVl0eYcOp6WVaUr6HGZYaV6sJ1ZbwZ8mclS.jpg',
    'colors' => ['Black', 'Brown', 'Dark Green']
];

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-500">
    <div class="product-card bg-white shadow-md rounded-lg p-3 w-72 relative">
        {{-- Wishlist Button --}}
        <button class="absolute top-3 right-3 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 hover:text-red-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>

        {{-- Product Image --}}
        <div class="w-full h-48 mb-3 overflow-hidden rounded-lg">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
        </div>

        {{-- Product Details --}}
        <div>
            <div class="flex justify-between items-center mb-1">
                <h2 class="text-lg font-bold text-gray-800 truncate pr-2">{{ $product['name'] }}</h2>
                <div class="flex items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $product['rating'])
                            <svg class="w-3.5 h-3.5 text-yellow-500 fill-current" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg class="w-3.5 h-3.5 text-gray-300 fill-current" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endif
                    @endfor
                    <span class="text-xs text-gray-600 ml-1">({{ $product['reviews'] }})</span>
                </div>
            </div>

            <p class="text-xs text-gray-600 mb-1">{{ $product['brand'] }}</p>

            {{-- Price Section --}}
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <span class="text-lg font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                    @if(isset($product['original_price']))
                        <span class="line-through text-gray-500 text-xs ml-2">${{ number_format($product['original_price'], 2) }}</span>
                        <span class="bg-red-500 text-white text-xs px-1.5 py-0.5 rounded ml-1">
                            {{ number_format(($product['original_price'] - $product['price']) / $product['original_price'] * 100, 0) }}% OFF
                        </span>
                    @endif
                </div>
            </div>

            {{-- Color Selection --}}
            @if(isset($product['colors']))
                <div class="mb-2">
                    <p class="text-xs text-gray-600 mb-1">Colors:</p>
                    <div class="flex space-x-1.5">
                        @foreach($product['colors'] as $color)
                            <div class="w-4 h-4 rounded-full border" style="background-color: {{ strtolower($color) }};"></div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Add to Cart Button --}}
            <button class="cursor-pointer w-full bg-blue-600 text-white py-2 rounded-lg text-sm hover:bg-blue-700 transition flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                Add to Cart
            </button>
        </div>
    </div>
</body>
</html>
