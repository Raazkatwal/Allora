<div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div
        class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8 text-center transform transition-all duration-500 ease-in-out animate-fade-in"
        role="alert"
        aria-live="polite"
    >
        <h1 class="text-4xl font-bold text-gray-800 mb-4 tracking-tight">
            No Items in Cart
        </h1>
        <p class="text-gray-600 mb-8 text-lg">
            Your cart is currently empty. Start shopping to add items!
        </p>
        <a
            href="{{ route('index') }}"
            class="inline-flex items-center gap-2 px-6 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
            aria-label="{{ __('cart.continue_shopping') }}"
        >
            Continue Shopping
            <x-lucide-arrow-right />
        </a>
    </div>
</div>

@section('style')
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

@endsection
