<div>
    <aside class="bg-gray-900 h-screen w-64 flex flex-col gap-6 p-4 shadow-lg">
        <!-- Logo -->
        <div class="flex justify-center">
            @include('components.logo_white')
        </div>

        <!-- Navigation Links -->
        <nav class="flex flex-col gap-2 w-full">
            <a href="{{ route('admin.panel') }}"
                class="flex items-center gap-3 p-3 rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.panel') ? 'bg-indigo-800' : '' }}"
                wire:navigate>
                <x-lucide-layout-dashboard class="w-5 h-5" />
                <span class="text-sm font-medium">Dashboard</span>
            </a>
            <a href=""
                class="flex items-center gap-3 p-3 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200"
                wire:navigate>
                <x-lucide-shopping-bag class="w-5 h-5" />
                <span class="text-sm font-medium">Products</span>
            </a>
            <a href=""
                class="flex items-center gap-3 p-3 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200"
                wire:navigate>
                <x-lucide-folders class="w-5 h-5" />
                <span class="text-sm font-medium">Categories</span>
            </a>
            <a href=""
                class="flex items-center gap-3 p-3 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200"
                wire:navigate>
                <x-lucide-settings class="w-5 h-5" />
                <span class="text-sm font-medium">Settings</span>
            </a>
        </nav>

        <!-- Logout (Bottom) -->
        <div class="mt-auto">
            <a href=""
                class="flex items-center gap-3 p-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition-colors duration-200 w-full"
                wire:navigate>
                <x-lucide-log-out class="w-5 h-5" />
                <span class="text-sm font-medium">Exit</span>
            </a>
        </div>
    </aside>
</div>
