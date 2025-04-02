<div class="p-6 bg-gray-50 size-full shadow-sm">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Dashboard Overview</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Products -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-indigo-100 text-indigo-600 grid place-items-center">
                <x-lucide-package class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Products</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $totalProducts }}</p>
            </div>
        </div>
        <!-- Total Sales -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-green-100 text-green-600 grid place-items-center">
                <x-lucide-dollar-sign class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Sales</h3>
                <p class="text-2xl font-bold text-gray-900">${{ number_format($totalSales, 2) }}</p>
            </div>
        </div>
        <!-- Orders Today -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-cyan-100 text-cyan-600 grid place-items-center">
                <x-lucide-shopping-cart class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Orders Today</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $ordersToday }}</p>
            </div>
        </div>
        <!-- Completed Orders -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-green-100 text-green-600 grid place-items-center">
                <x-lucide-package-check class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Completed Orders</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $completedOrders }}</p>
            </div>
        </div>
        <!-- Low Stock Products -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-red-100 text-red-600 grid place-items-center">
                <x-lucide-alert-triangle class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Low Stock Products</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $lowStockProducts }}</p>
            </div>
        </div>
        <!-- Total Categories -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-amber-100 text-amber-600 grid place-items-center">
                <x-lucide-folders class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Categories</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
            </div>
        </div>
        <!-- Total Users -->
        <div class="p-4 bg-white rounded-lg shadow-md flex items-center gap-4">
            <div class="size-12 rounded-full bg-indigo-100 text-indigo-600 grid place-items-center">
                <x-lucide-users class="size-6" />
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600">Total Users</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>
</div>
