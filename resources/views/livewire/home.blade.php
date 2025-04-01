<div class="mb-32">
    <div class="grid md:grid-cols-3 gap-6">
        <a href="#" class="h-52 grid place-items-center relative">
            <img src="{{ asset('img/men.jpg') }}" alt="Men"
                class="row-start-1 col-start-1 opacity-85 h-full w-full object-cover">
            <h1 class="absolute text-5xl top-[25%] left-[5%] row-start-1 col-start-1">For Men's</h1>
            <h3 class="absolute text-lg bottom-[20%] left-[5%] uppercase flex gap-2 items-center">Shop now
                <x-lucide-arrow-right class="w-5" />
            </h3>
        </a>
        <a href="#" class="h-52 grid place-items-center relative">
            <img src="{{ asset('img/sale.jpg') }}" alt="Sale"
                class="row-start-1 col-start-1 opacity-50 h-52 w-full object-cover">
            <h1 class="absolute text-5xl top-[25%] left-[5%] row-start-1 col-start-1">For Sale</h1>
            <h3 class="absolute text-lg bottom-[20%] left-[5%] uppercase flex gap-2 items-center">Shop now at 99%
                discount
                <x-lucide-arrow-right class="w-5" />
            </h3>
        </a>
        <a href="#" class="h-52 grid place-items-center relative">
            <img src="{{ asset('img/women.jpg') }}" alt="Women"
                class="row-start-1 col-start-1 opacity-85 h-full w-full object-cover">
            <h1 class="text-5xl row-start-1 col-start-1 absolute top-5 right-5">For <br> Women's</h1>
            <h3 class="text-lg uppercase row-start-1 col-start-1 absolute bottom-10 right-15 flex gap-2 items-center">
                Shop now
                <x-lucide-arrow-right class="w-5" />
            </h3>
        </a>
    </div>

    <h1 class="my-15 text-center text-6xl">Shop bags</h1>
    <div class="grid md:grid-cols-4 grid-cols-2 gap-4 px-12">
        @php
        $bags = $products->filter(function ($product){
        return $product->category && strtolower($product->category->name) == 'bags';
        })->take(10);
        $shoes = $products->filter(function ($product){
        return $product->category && strtolower($product->category->name) == 'shoes';
        })->take(10);
        @endphp
        @foreach ($bags as $product)

        <x-product-card :name="$product->name" :price="$product->price" :category="$product->category->name"
            :href="route('product', ['id'=> $product->id])"
            :image="asset('storage/' . $product->images->first()->path)" />

        @endforeach
    </div>
    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5 my-16 h-52">
        <div class="bg-no-repeat bg-cover bg-[position:50%_0] relative cursor-pointer"
            style="background-image: url(img/banner-1.jpg);">
            <div class="absolute top-1/2 right-[5%] text-[#222] -translate-y-1/2">
                <p class="text-lg uppercase tracking-wider">New Arrivals</p>
                <h1 class="text-3xl">Season Training Shoes</h1>
                <p class="text-lg font-semibold">Only from <span class="text-sky-500">79.88$</span></p>
            </div>
        </div>
        <div class="bg-no-repeat bg-cover bg-[position:50%_0] relative cursor-pointer"
            style="background-image: url(img/banner-2.jpg);">
            <div class="absolute top-1/2 right-[5%] text-[#222] -translate-y-1/2" style="color: white;">
                <p class="text-lg uppercase tracking-wider">Top Product</p>
                <h1 class="text-3xl">Suitable Women Wear</h1>
                <p class="text-lg font-semibold">Only from <span class="text-sky-500">79.88$</span></p>
            </div>
        </div>
    </div>
    <h1 class="my-10 text-center text-5xl">Shop Shoes</h1>
    <div class="grid md:grid-cols-4 grid-cols-2 gap-4 px-12">
        @foreach ($shoes as $product)

        <x-product-card :name="$product->name" :price="$product->price" :category="$product->category->name"
            :href="route('product', ['id'=> $product->id])"
            :image="asset('storage/' . $product->images->first()->path)" />

        @endforeach
    </div>
</div>
