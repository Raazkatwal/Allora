<div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    @guest

        <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8 text-center transform transition-all duration-500 ease-in-out animate-fade-in"
            role="alert" aria-live="polite">
            <h1 class="text-4xl font-bold text-gray-800 mb-4 tracking-tight">
                No Items in Cart
            </h1>
            <p class="text-gray-600 mb-8 text-lg">
                Your cart is currently empty. Start shopping to add items!
            </p>
            <a href="{{ route('index') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
                aria-label="{{ __('cart.continue_shopping') }}">
                Continue Shopping
                <x-lucide-arrow-right />
            </a>
        </div>
    @endguest

    @auth

        <main class="container mx-auto px-4 py-8">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">My Cart</h1>
                <p class="text-gray-600 mt-2">Review and modify items before checkout</p>
            </div>

            <!-- Cart Container -->
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3">
                    <!-- Cart Items Header - Desktop only -->
                    <div
                        class="hidden md:grid grid-cols-12 gap-4 mb-4 px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-600">
                        <div class="col-span-6">Product</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-2 text-center">Quantity</div>
                        <div class="col-span-2 text-right">Total</div>
                    </div>

                    <!-- Cart Item 1 -->
                    <div class="bg-white rounded-lg shadow-sm mb-4 overflow-hidden">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 items-center">
                            <!-- Product Info -->
                            <div class="col-span-1 md:col-span-6 flex gap-4 items-center">
                                <div class="relative">
                                    <img src="{{ asset('images/products/tshirt-1.jpg') }}" alt="T-Shirt"
                                        class="w-20 h-20 object-cover rounded">
                                    <button
                                        class="absolute -top-2 -right-2 bg-gray-200 hover:bg-gray-300 rounded-full w-6 h-6 flex items-center justify-center text-gray-600 transition">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800">Premium Cotton T-Shirt</h3>
                                    <p class="text-sm text-gray-600">Size: Medium | Color: Blue</p>
                                    <p class="md:hidden text-sm font-medium text-gray-900 mt-1">$29.99</p>
                                </div>
                            </div>

                            <!-- Price - Hidden on mobile -->
                            <div class="hidden md:block md:col-span-2 text-center">
                                <span class="font-medium text-gray-800">$29.99</span>
                            </div>

                            <!-- Quantity -->
                            <div class="col-span-1 md:col-span-2 flex justify-start md:justify-center">
                                <div class="flex items-center border border-gray-300 rounded-md">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                    <input type="text" value="1"
                                        class="w-10 text-center border-none focus:ring-0 focus:outline-none text-gray-700">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="col-span-1 md:col-span-2 text-right">
                                <span class="font-semibold text-gray-900">$29.99</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="bg-white rounded-lg shadow-sm mb-4 overflow-hidden">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 items-center">
                            <!-- Product Info -->
                            <div class="col-span-1 md:col-span-6 flex gap-4 items-center">
                                <div class="relative">
                                    <img src="{{ asset('images/products/jeans-1.jpg') }}" alt="Jeans"
                                        class="w-20 h-20 object-cover rounded">
                                    <button
                                        class="absolute -top-2 -right-2 bg-gray-200 hover:bg-gray-300 rounded-full w-6 h-6 flex items-center justify-center text-gray-600 transition">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800">Slim Fit Denim Jeans</h3>
                                    <p class="text-sm text-gray-600">Size: 32 | Color: Dark Blue</p>
                                    <p class="md:hidden text-sm font-medium text-gray-900 mt-1">$59.99</p>
                                </div>
                            </div>

                            <!-- Price - Hidden on mobile -->
                            <div class="hidden md:block md:col-span-2 text-center">
                                <span class="font-medium text-gray-800">$59.99</span>
                            </div>

                            <!-- Quantity -->
                            <div class="col-span-1 md:col-span-2 flex justify-start md:justify-center">
                                <div class="flex items-center border border-gray-300 rounded-md">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                    <input type="text" value="1"
                                        class="w-10 text-center border-none focus:ring-0 focus:outline-none text-gray-700">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="col-span-1 md:col-span-2 text-right">
                                <span class="font-semibold text-gray-900">$59.99</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="bg-white rounded-lg shadow-sm mb-4 overflow-hidden">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 items-center">
                            <!-- Product Info -->
                            <div class="col-span-1 md:col-span-6 flex gap-4 items-center">
                                <div class="relative">
                                    <img src="{{ asset('images/products/sneakers-1.jpg') }}" alt="Sneakers"
                                        class="w-20 h-20 object-cover rounded">
                                    <button
                                        class="absolute -top-2 -right-2 bg-gray-200 hover:bg-gray-300 rounded-full w-6 h-6 flex items-center justify-center text-gray-600 transition">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800">Urban Sport Sneakers</h3>
                                    <p class="text-sm text-gray-600">Size: 10 | Color: White</p>
                                    <p class="md:hidden text-sm font-medium text-gray-900 mt-1">$89.99</p>
                                </div>
                            </div>

                            <!-- Price - Hidden on mobile -->
                            <div class="hidden md:block md:col-span-2 text-center">
                                <span class="font-medium text-gray-800">$89.99</span>
                            </div>

                            <!-- Quantity -->
                            <div class="col-span-1 md:col-span-2 flex justify-start md:justify-center">
                                <div class="flex items-center border border-gray-300 rounded-md">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                    <input type="text" value="1"
                                        class="w-10 text-center border-none focus:ring-0 focus:outline-none text-gray-700">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="col-span-1 md:col-span-2 text-right">
                                <span class="font-semibold text-gray-900">$89.99</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions and Coupon -->
                    <div
                        class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between border-t border-gray-200 pt-6">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input type="text" placeholder="Coupon code"
                                class="px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <button
                                class="px-5 py-2.5 bg-gray-800 text-white rounded-md hover:bg-gray-700 transition text-sm font-medium">Apply
                                Coupon</button>
                        </div>
                        <button
                            class="px-5 py-2.5 bg-white border border-gray-300 hover:bg-gray-50 rounded-md text-gray-600 transition flex items-center gap-2 text-sm font-medium">
                            <i class="fas fa-sync-alt"></i> Update Cart
                        </button>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Cart Summary</h2>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium text-gray-800">$179.97</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="text-gray-800">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Discount</span>
                                <span class="text-green-600">- $0.00</span>
                            </div>
                            <div class="flex justify-between pt-3 border-t border-gray-200">
                                <span class="font-semibold text-gray-800">Total</span>
                                <span class="font-bold text-lg text-gray-900">$179.97</span>
                            </div>
                        </div>

                        <button
                            class="w-full py-3 cursor-pointer bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium transition flex items-center justify-center gap-2">
                            Proceed to Checkout <i class="fas fa-arrow-right"></i>
                        </button>

                        <div class="mt-6">
                            <h3 class="font-medium text-gray-800 mb-2">We Accept</h3>
                            <div class="flex gap-2 justify-center items-center">
                                <div class="bg-[#5bb80b] p-4 rounded-xl">
                                    <img src="{{ asset('img/e_sewa.png') }}" alt="E-sewa" class="h-8">
                                </div>
                                <div class="bg-[#f38b1c] p-4 rounded-xl">
                                    <img src="{{ asset('img/khalti.png') }}" alt="Khalti" class="h-8">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="mt-6">
                        <a href="#"
                            class="flex items-center justify-center gap-2 text-blue-600 hover:text-blue-800 font-medium">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </main>
    @endauth

</div>

@push('css')
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-in-out;
        }
    </style>
@endpush
