<div class="p-6 bg-gray-50 shadow-sm">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Dashboard Overview</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Total Products -->
        <div
            class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 flex items-center gap-4">
            <div class="size-12 rounded-full bg-indigo-100 text-indigo-600 grid place-items-center">
                <x-lucide-package class="w-6 h-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Products</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $totalProducts }}</p>
            </div>
        </div>
        <!-- Total Users -->
        <div
            class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 flex items-center gap-4">
            <div class="size-12 rounded-full bg-teal-100 text-teal-600 grid place-items-center">
                <x-lucide-users class="w-6 h-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Users</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
            </div>
        </div>
        <!-- Total Categories -->
        <div
            class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 flex items-center gap-4">
            <div class="size-12 rounded-full bg-amber-100 text-amber-600 grid place-items-center">
                <x-lucide-folders class="w-6 h-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Categories</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
            </div>
        </div>
    </div>
</div>
