<div>
    <nav class="flex justify-between items-center h-20 z-50 sticky top-0 w-full bg-white shadow-blue-300">
        <div class="pl-14 flex items-center gap-6 ">
            <x-lucide-menu class="w-5 block md:hidden" />
            <a href={{ route('index') }}>
                @include('components.logo')
            </a>
            <div class="md:flex items-center justify-between gap-5 hidden">
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href={{ route('index') }}
                    wire:navigate>Home</a>
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500"
                    href={{ route('all.products') }}>Products</a>
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href="#" wire:navigate>About
                    Us</a>
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href="#" wire:navigate>Contact
                    Us</a>

            </div>
        </div>
        <div class="pr-12 flex items-center gap-5 justify-between" x-data="{ open: false }">
            @guest
                <a class="transition ease-in delay-100 hover:text-blue-500 text-sky-600 flex items-center gap-2"
                    href={{ route('login') }} wire:navigate><x-lucide-user class="w-5" /> Login / Register</a>
            @endguest
            <x-lucide-search class="w-7 text-sky-600" />
            <x-lucide-heart class="w-7 text-sky-600" />
            <a href={{ route('cart') }} class="relative">
                <x-lucide-shopping-cart class="w-7 text-sky-600" />
                <div
                    class="bg-sky-600 absolute top-0 right-0 grid place-items-center rounded-full translate-x-1/2 -translate-y-1/2 size-6 text-xs text-white">
                    {{ $this->totalCartItems }}</div>
            </a>
            @auth
                <div class="relative">
                    <div x-data="{
                        dropdownOpen: false
                    }" class="relative">

                        <button @click="dropdownOpen=true"
                            class="inline-flex cursor-pointer items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                            <img src="https://i.pravatar.cc/150?img={{ Auth::id() }}"
                                class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                            <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                                <span>{{ auth()->user()->username }}</span>
                                <span class="text-xs font-light text-neutral-400">{{ auth()->user()->email }}</span>
                            </span>
                            <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                        </button>

                        <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                            x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                            x-transition:enter-end="translate-y-0"
                            class="absolute top-0 z-50 w-48 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                            <div
                                class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                                <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                <a href="#_"
                                    class="cursor-pointer relative flex select-none hover:bg-neutral-100 items-center rounded px-2 py-3 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                    <x-lucide-user class="size-4 mr-2" />
                                    <span>Profile</span>
                                </a>
                                @if (auth()->user()->profile?->usertype == 'admin')
                                    <a href="{{ route('admin.panel') }}" wire:navigate
                                        class="cursor-pointer relative flex select-none hover:bg-neutral-100 items-center rounded px-2 py-3 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                        <x-lucide-shield class="size-4 mr-2" />
                                        <span>Admin Panel</span>
                                    </a>
                                @endif
                                <a href="#_"
                                    class="cursor-pointer relative flex select-none hover:bg-red-500 hover:text-white items-center rounded px-2 py-3 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                    <x-lucide-log-out class="size-4 mr-2" />
                                    <span>Log out</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            @endauth
        </div>
    </nav>
    <nav class="mbl-nav md:hidden">
        <i class="fa-solid fa-xmark"></i>
        <div class="mbl-nav-search-section">
            <input type="text" class="mbl-nav-search-input" placeholder="Search...">
            <button class="mbl-nav-search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="mbl-nav-links">
            <a href={{ route('index') }}>Home</a>
            <a href="#">Categories</a>
            <a href="#">Products</a>
            <a href="#">My Wishlist</a>
            <a href="login.php"><i class="fa-regular fa-user"></i> Login</a>
        </div>
        <div>
            <h1 class="currency-selection-title">Select Currency:</h1>
            <div class="currency-btns-list">
                <button class="currency-btn"><img src="img/nepal-flag.png" class="currency-country-img"
                        alt="Nepal Flag"> NPR</button>
                <button class="currency-btn"><img src="img/india-flag.png" class="currency-country-img"
                        alt="India Flag"> INR</button>
                <button class="currency-btn"><img src="img/usa-flag.png" class="currency-country-img"
                        alt="United States of America Flag"> USD</button>
            </div>
        </div>
    </nav>

    <dialog id="logout-modal">
        <div class="modal-content">
            <h1 class="modal-head">Are you sure ?</h1>
            <p class="modal-text">Are you sure you want to logout ?</p>
            <form action={{ route('logout') }} method="POST">
                @csrf
                <div class="flex-btns">
                    <input type="submit" class="table-btn delete-btn" value="Logout">
                    <button class="table-btn" id="modal-close-btn">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>
</div>
