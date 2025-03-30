<div>
    <nav class="flex justify-between items-center h-20 z-50 sticky top-0 w-full bg-white shadow-blue-300">
        <div class="pl-14 flex items-center gap-6 ">
            <x-lucide-menu class="w-5 block md:hidden" />
            <a href={{ route('index') }}>
                @include('components.logo')
            </a>
            <div class="md:flex items-center justify-between gap-5 hidden">
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href={{ route('index')
                    }} wire:navigate>Home</a>
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href={{
                    route('all.products') }}>Products</a>
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href="#"
                    wire:navigate>About Us</a>
                <a class="text-lg transition ease-in delay-100 hover:text-blue-500" href="#"
                    wire:navigate>Contact Us</a>

            </div>
        </div>
        <div class="pr-12 flex items-center gap-5 justify-between" x-data="{ open: false }">
            @guest
                <a class="transition ease-in delay-100 hover:text-blue-500 text-sky-600 flex items-center gap-2" href={{route('login')}} wire:navigate><x-lucide-user class="w-5" /> Login / Register</a>
            @endguest
            <x-lucide-search class="w-5 text-sky-600" />
            <x-lucide-heart class="w-5 text-sky-600" />
            <a href={{ route('cart') }} class="cart-wrapper">
                <x-lucide-shopping-cart class="w-5 text-sky-600" />
                {{-- <div class="cart-count">{{ collect(session()->get('cart'))->sum('quantity') ?? 0 }}</div> --}}
            </a>
            @if (Auth::check())
            <div class='size-10 bg-emerald-400 grid place-items-center cursor-pointer relative rounded-full select-none'
                @click="open = !open">{{ strtoupper(substr(Auth::user()->username, 0, 1)) }}</div>
            <div x-show="open" @click.away="open = false"
                class="top-0 translate-x-[25%] mt-16 absolute min-w-40 bg-[#f1f1f1]">
                <a class="py-3 px-4 block text-lg hover:bg-[#ddd]" href={{ route('profile',
                    ['name'=>Auth::user()->username]) }}><i class="fa-solid fa-user"></i> Profile</a>
                <a class="py-3 px-4 block text-lg hover:bg-[#ddd]" href=""><i class="fa-solid fa-gear"></i> Settings</a>
                @if (Auth::check() && Auth::user()->profile?->usertype == 'admin' )
                <a class="py-3 px-4 block text-lg hover:bg-[#ddd]" href={{route('admin.panel')}} target="_blank"
                    wire:navigate>Admin</a>
                @endif
                <a class="py-3 px-4 block text-lg hover:bg-[#ddd]" href="{{ route('logout') }}" id="modal-open-btn"><i
                        class="fa-solid fa-power-off"></i> Logout</a>
            </div>
            @endif
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
