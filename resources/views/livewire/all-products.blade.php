@push('css')
<style>
    /* Hide default range styling */
    input[type="range"] {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        position: absolute;
        background: transparent;
        pointer-events: none;
        z-index: 2;
    }

    /* Custom track (hidden default) */
    input[type="range"]::-webkit-slider-runnable-track {
        height: 2px;
    }

    /* Custom thumb styling (Centered) */
    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        background: white;
        border: 3px solid #23a9f7;
        border-radius: 50%;
        cursor: pointer;
        pointer-events: auto;
        position: relative;
        z-index: 3;
        transform: translateY(-30%);
    }

    input[type="range"]::-moz-range-thumb {
        width: 18px;
        height: 18px;
        background: white;
        border: 3px solid #23a9f7;
        border-radius: 50%;
        cursor: pointer;
        pointer-events: auto;
        z-index: 3;
        transform: translateY(-30%);
    }

    /* Centering the range input itself */
    .slider-container {
        position: relative;
        height: 18px;
        /* Adjust height to fit thumb */
    }
</style>
@endpush

<div class="grid grid-cols-[25%_75%] gap-5 px-12">
    <div class="col-span-3 text-3xl text-center my-8">All Products</div>
    <form class="w-[90%] flex flex-col gap-5" wire:submit.prevent="applyFilters">
        <h1>Filters</h1>
        <div>
            <label for="sort">Sort by:</label>
            <select name="sort" id="sort" class="sort" wire:model="sort">
                <option value="" {{ $sort === '' ? 'selected' : '' }} >Default sorting</option>
                <option value="asc">Price: Low to High
                </option>
                <option value="desc">Price: High to Low
                </option>
            </select>
        </div>

        {{-- <div class="price-range-container">
            <label for="price">Price</label>
            <div class="price-inputs">
                <input type="number" id="min-price" name="min-price" class="min-input" min={{$min}} max={{$max}}
                    value={{$min}}>
                <span>to</span>
                <input type="number" id="max-price" name="max-price" class="max-input" min={{$min}} max={{$max}}
                    value={{$max}}>
            </div>
            <div class="slider-container">
                <div class="price-slider"></div>
                <input type="range" id="min-range" class="range-input" min={{$min}} max={{$max}} value={{$min}}
                    step="1">
                <input type="range" id="max-range" class="range-input" min={{$min}} max={{$max}} value={{$max}}
                    step="1">
            </div>
        </div> --}}
        <div x-data="rangeSlider({{$min}}, {{$max}})" class="relative mt-4 w-full">
            <!-- Custom Range Inputs -->
            <input type="range" x-model="min" :min="minLimit" :max="maxLimit" wire:model="selectedMin" @input="updateRange"
                class="absolute w-full h-2 opacity-0 pointer-events-none">
            <input type="range" x-model="max" :min="minLimit" :max="maxLimit" wire:model="selectedMax" @input="updateRange"
                class="absolute w-full h-2 opacity-0 pointer-events-none">

            <!-- Custom Track -->
            <div class="relative w-full h-2 bg-gray-200 rounded-md">
                <div class="absolute h-2 bg-gradient-to-r from-sky-900 to-sky-500 rounded-md"
                    :style="{ left: minPercent + '%', right: (100 - maxPercent) + '%' }">
                </div>

                <!-- Min Circle -->
                <div class="absolute w-5 h-5 bg-sky-400 rounded-full cursor-pointer transform -translate-x-1/2 -top-1.5"
                    :style="{ left: minPercent + '%' }">
                </div>

                <!-- Max Circle -->
                <div class="absolute w-5 h-5 bg-sky-400 rounded-full cursor-pointer transform -translate-x-1/2 -top-1.5"
                    :style="{ left: maxPercent + '%' }">
                </div>
            </div>

            <!-- Price Display -->
            <div class="flex justify-between mt-3 text-gray-600">
                <span>Min Price: $<span x-text="min"></span></span>
                <span>Max Price: $<span x-text="max"></span></span>
            </div>
        </div>
        <div class="categories-wrapper">
            <details>
                <summary>Categories</summary>
                <flux:checkbox.group wire:model="categoryIds">
                    @foreach ($categories as $category)
                    {{-- <div>
                        <input type="checkbox" name="categories[]" id="{{ $category->name }}"
                            value="{{ $category->id }}" {{ in_array($category->id, request('categories', [])) ?
                        'checked' : '' }}>
                        <label for="{{ $category->name }}">{{ $category->name }}</label>
                    </div> --}}
                    <flux:checkbox label="{{ $category->name }}" value="{{ $category->id }}" />
                    @endforeach
                </flux:checkbox.group>
                <div>
                </div>
            </details>
        </div>

        <button type="submit"
            class="bg-blue-600 text-white border-none py-2 px-4 rounded-md font-bold cursor-pointer">Apply</button>
        {{-- <button type="reset"
            class="border border-blue-600 text-blue-600 py-2 px-4 rounded-md font-bold cursor-pointer">Reset</button> --}}
    </form>

    <div class="grid grid-cols-4 gap-y-5">
        @forelse ($products as $product)
        <div wire:key="{{$product->id}}">
            <x-product-card :name="$product->name" :price="$product->price" :category="$product->category->name"
                :href="route('product', ['id'=> $product->id])"
                :image="asset('storage/' . $product->images->first()->path)" />
        </div>
        @empty
        <h1>No Products Found</h1>
        @endforelse
    </div>
</div>

@push('js')
{{-- @script --}}
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("rangeSlider", (min, max) => ({
            min: min,
            max: max,
            minLimit: min,
            maxLimit: max,
            minGap: 100,
    
            get minPercent() {
                return (this.min / this.maxLimit) * 100;
            },
            get maxPercent() {
                return (this.max / this.maxLimit) * 100;
            },
    
            updateRange(event) {
                if (this.max - this.min < this.minGap) {
                    if (event.target === event.target.parentElement.querySelector('input[type="range"]:first-of-type')) {
                        this.min = this.max - this.minGap;
                    } else {
                        this.max = this.min + this.minGap;
                    }
                }
            }
        }));
    });
</script>
{{-- @endscript --}}
@endpush