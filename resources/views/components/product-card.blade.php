<div>
    <a href={{ $href }} class="h-80">
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
    </a>
</div>