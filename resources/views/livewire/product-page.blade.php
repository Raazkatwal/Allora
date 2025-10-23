@push('css')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endpush

<div class="container mx-auto px-4 py-12">
    <!-- Product Info Section -->
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Image Gallery -->
        <div class="w-full md:w-1/2 space-y-6">
            <div class="w-full h-[400px] overflow-hidden rounded-lg">
                <img src="{{ asset($product->images->first()->path) }}" alt="Main Image"
                    class="main-image w-full h-full object-cover transition-transform duration-300 hover:scale-105">
            </div>
            <div class="flex space-x-4 overflow-x-auto scrollbar-hide">
                @foreach ($product->images as $item)
                    <img src="{{ asset($item->path) }}" alt="Thumbnail"
                        class="w-30 h-30 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity"
                        onclick="document.querySelector('.main-image').src=this.src">
                @endforeach
            </div>
        </div>

        <!-- Product Details -->
        <div class="w-full md:w-1/2 space-y-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
            <h2 class="text-2xl font-semibold text-sky-600">${{ $product->price }}</h2>
            <div class="flex space-x-1 text-yellow-400 text-2xl">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="text-lg text-gray-600">{{ $product->description }}</p>
            <div class="flex items-center space-x-4" x-data="{ quantity: $wire.entangle('quantity') }">
                <div class="flex items-center space-x-2 border border-gray-300 rounded-lg p-2">
                    <button @click="quantity = Math.max(1, quantity - 1)"
                        class="text-gray-600 hover:text-sky-600 text-2xl cursor-pointer">-</button>
                    <input type="number" x-model="quantity"
                        class="w-20 text-center border-0 focus:outline-none text-xl" min="1">
                    <button @click="quantity = quantity + 1"
                        class="text-gray-600 hover:text-sky-600 text-2xl cursor-pointer">+</button>
                </div>
                <form method="POST" x-data="{ quantity: 1 }" wire:submit.prevent="cartAdd">
                    @csrf
                    <input type="hidden" name="quantity" x-bind:value="quantity" wire:model="quantity">
                    <button type="submit"
                        class="bg-sky-600 text-white cursor-pointer px-5 py-2 rounded-lg hover:bg-sky-700 transition-colors text-lg">
                        <i class="fa-solid fa-bag-shopping mr-2"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Similar Products Section -->
    <div class="mt-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Similar Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($similarProducts as $product)
                <x-product-card :name="$product->name" :price="$product->price" :category="$product->category->name" :href="route('product', ['id' => $product->id])"
                    :image="asset($product->images->first()->path)" />
            @endforeach
        </div>
    </div>
</div>
