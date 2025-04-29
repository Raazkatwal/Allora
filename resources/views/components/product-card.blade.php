@props([
    'name' => 'Unnamed Product',
    'price' => 0,
    'category' => 'Uncategorized',
    'href' => '#',
    'image' => '/images/default.png',
    'discount' => null,
    'originalPrice' => null,
    'reviews' => 0,
    'stock' => null,
])


{{-- <a href={{ $href }} class="h-80">
    <div
        class='w-56 h-72 rounded-2xl p-3 transition-shadow duration-300 shadow-[0_6px_12px_rgba(0,0,0,0.15),0_4px_8px_rgba(0,0,0,0.1)] hover:shadow-[0_16px_32px_rgba(0,0,0,0.25),0_8px_16px_rgba(0,0,0,0.2)]'>
        <img src={{ $image }} alt={{$name}} class='object-cover aspect-square h-32 w-full'>
        <div class='text-center my-2'>
            <div class="tracking-widest uppercase text-gray-500 font-poppins"> {{ $category ?? 'Uncategorized' }}
            </div>
            <h2 class=' text-xl cursor-pointer truncate hover:text-sky-500'>{{ $name }}</h2>
            <div class="text-amber-500 flex place-content-center">
                <x-lucide-star class="w-5 fill-yellow-500" />
                <x-lucide-star class="w-5 fill-yellow-500" />
                <x-lucide-star class="w-5 fill-yellow-500" />
                <x-lucide-star class="w-5 fill-yellow-500" />
                <x-lucide-star class="w-5" />
            </div>
            <p class='text-lg font-semibold'>$ {{ $price }} </p>
        </div>
    </div>
</a> --}}


{{-- <a href="{{ $href }}" class="block transform transition-all duration-300 hover:-translate-y-2">
    <div class='w-64 h-80 rounded-2xl p-4 bg-white
        transition-all duration-300
        shadow-[0_6px_12px_rgba(0,0,0,0.1)]
        hover:shadow-[0_12px_24px_rgba(0,0,0,0.15)]
        border border-gray-100
        hover:border-transparent
        group'>

        @if(isset($discount))
            <div class="absolute top-4 right-4 bg-emerald-500 text-white text-xs px-2 py-1 rounded-full">
                {{ $discount }}% OFF
            </div>
        @endif

        <div class="relative overflow-hidden rounded-xl mb-3">
            <img
                src="{{ $image }}"
                alt="{{ $name }}"
                class='object-cover aspect-square h-40 w-full
                    transition-transform duration-300
                    group-hover:scale-105'
            >
        </div>

        <div class='text-center'>
            <div class="tracking-widest uppercase text-xs text-gray-400 font-medium mb-1">
                {{ $category ?? 'Uncategorized' }}
            </div>

            <h2 class='text-lg font-bold text-gray-800 mb-2 truncate
                transition-colors duration-300
                group-hover:text-sky-600'>
                {{ $name }}
            </h2>

            <div class="flex justify-center items-center mb-2">
                @php
                    $rating = 2.5;
                    $fullStars = floor($rating);
                    $halfStar = $rating - $fullStars >= 0.5;
                @endphp

                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $fullStars)
                        <x-lucide-star class="w-4 fill-yellow-500 text-yellow-500" />
                    @elseif($i == $fullStars + 1 && $halfStar)
                        <x-lucide-star class="w-4 fill-yellow-300 text-yellow-300" />
                    @else
                        <x-lucide-star class="w-4 text-gray-300" />
                    @endif
                @endfor
                <span class="text-xs text-gray-500 ml-2">({{ $reviews ?? 0 }})</span>
            </div>

            <div class="flex justify-center items-center space-x-2">
                <p class='text-lg font-bold text-gray-900'>
                    ${{ number_format($price, 2) }}
                </p>
                @if(isset($originalPrice))
                    <p class='text-sm text-gray-400 line-through'>
                        ${{ number_format($originalPrice, 2) }}
                    </p>
                @endif
            </div>
        </div>
        <button class="cursor-pointer w-full bg-sky-600 text-white py-2 rounded-lg text-sm hover:bg-blue-700 transition flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg>
        Add to Cart
    </button>
    </div>
</a> --}}

{{-- <a href="{{ $href }}" class="block group transform transition-all duration-300 hover:-translate-y-1.5">
    <div class="relative w-72 rounded-xl bg-white shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-gray-200">
        @if(isset($discount))
            <div class="absolute top-4 left-4 z-10 bg-gradient-to-br from-pink-500 to-purple-500 text-white text-xs font-semibold px-3 py-1 rounded-lg shadow-md">
                {{ $discount }}% OFF
            </div>
        @endif

        <div class="relative h-48 w-full overflow-hidden">
            <img
                src="{{ $image }}"
                alt="{{ $name }}"
                class="object-cover h-full w-full transition-transform duration-500 group-hover:scale-110"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="p-4">
            <p class="text-xs uppercase tracking-wide text-gray-500 font-medium mb-1 truncate">
                {{ $category ?? 'Uncategorized' }}
            </p>

            <h2 class="text-xl font-semibold text-gray-900 truncate mb-2 group-hover:text-indigo-600 transition-colors duration-300">
                {{ $name }}
            </h2>

            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-1">
                    @php
                        $rating = 4.2;
                        $fullStars = floor($rating);
                        $halfStar = $rating - $fullStars >= 0.5;
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $fullStars)
                            <x-lucide-star class="w-4 h-4 fill-yellow-400 text-yellow-400" />
                        @elseif($i == $fullStars + 1 && $halfStar)
                            <x-lucide-star class="w-4 h-4 fill-yellow-200 text-yellow-200" />
                        @else
                            <x-lucide-star class="w-4 h-4 text-gray-200" />
                        @endif
                    @endfor
                    <span class="text-xs text-gray-500">({{ $reviews ?? 0 }})</span>
                </div>
                <span class="text-xs text-gray-600">{{ $stock ?? rand(0, 50) }} in stock</span>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <p class="text-xl font-bold text-gray-900">
                        ${{ number_format($price, 2) }}
                    </p>
                    @if(isset($originalPrice))
                        <p class="text-sm text-gray-400 line-through">
                            ${{ number_format($originalPrice, 2) }}
                        </p>
                    @endif
                </div>
                <button class="opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700">
                    <x-lucide-shopping-cart class="w-5 h-5" />
                </button>
            </div>
        </div>

        <button class="w-full bg-indigo-600 text-white py-2.5 text-sm font-medium transition-all duration-300 group-hover:opacity-0 group-hover:-translate-y-4 flex items-center justify-center gap-2">
            <x-lucide-shopping-cart class="w-4 h-4" /> Add to Cart
        </button>

        <button class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition-colors duration-200">
            <x-lucide-heart class="w-5 h-5" />
        </button>
    </div>
</a> --}}

<a href="{{ $href }}" class="block group transform transition-all duration-300 hover:-translate-y-1">
    <div class="relative w-72 rounded-xl bg-white shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-gray-200 overflow-hidden">
        @if(isset($discount))
            <div class="absolute top-3 left-3 bg-gradient-to-br from-orange-500 to-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-sm z-10">
                {{ $discount }}% OFF
            </div>
        @endif

        <div class="relative h-48 w-full overflow-hidden">
            <img
                src="{{ $image }}"
                alt="{{ $name }}"
                class="object-cover h-full w-full transition-transform duration-400 group-hover:scale-105"
            >
            <div class="absolute inset-0 bg-gray-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="p-5">
            <p class="text-xs uppercase tracking-wide text-gray-500 font-medium mb-1 truncate">
                {{ $category ?? 'Uncategorized' }}
            </p>

            <h2 class="text-xl font-semibold text-gray-900 truncate mb-2 group-hover:text-blue-600 transition-colors duration-300">
                {{ $name }}
            </h2>

            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center gap-1">
                    @php
                        $rating = 4.2;
                        $fullStars = floor($rating);
                        $halfStar = $rating - $fullStars >= 0.5;
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $fullStars)
                            <x-lucide-star class="size-4 fill-yellow-400 text-yellow-400" />
                        @elseif($i == $fullStars + 1 && $halfStar)
                            <x-lucide-star class="size-4 fill-yellow-200 text-yellow-200" />
                        @else
                            <x-lucide-star class="size-4 text-gray-200" />
                        @endif
                    @endfor
                    <span class="text-xs text-gray-500">({{ $reviews ?? 0 }})</span>
                </div>
                <span class="text-xs {{ ($stock ?? rand(0, 50)) < 10 ? 'text-red-500' : 'text-gray-600' }}">{{ $stock ?? rand(0, 50) }} in stock</span>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <p class="text-xl font-bold text-gray-900">
                        ${{ number_format($price, 2) }}
                    </p>
                    @if(isset($originalPrice))
                        <p class="text-sm text-gray-400 line-through">
                            ${{ number_format($originalPrice, 2) }}
                        </p>
                    @endif
                </div>
                <button class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition-colors duration-300 group-hover:shadow-md">
                    <x-lucide-heart class="w-5 h-5" />
                </button>
            </div>
        </div>

        <button class="w-full bg-blue-600 text-white py-2.5 text-sm font-medium rounded-b-xl hover:bg-blue-700 transition-colors duration-300 flex items-center justify-center gap-2">
            <x-lucide-shopping-cart class="w-4 h-4" /> Add to Cart
        </button>
    </div>
</a>
