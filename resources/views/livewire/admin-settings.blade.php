<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-semibold text-gray-800">Website Settings</h1>
        <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors duration-200 flex items-center gap-2 cursor-pointer" type="submit" wire:click="submit">
            <x-lucide-save class="w-5 h-5" /> Save Changes
        </button>
    </div>

    <!-- Settings Sections -->
    <form class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- General Settings -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">General Settings</h2>
            <div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Site Name</label>
                    <input type="text" value="{{$name}}" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('name')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Site Description</label>
                    <textarea class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="3">{{$description}}</textarea>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" wire:model="maintenance_mode" id="maintenance" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="maintenance" class="text-sm text-gray-600">Enable Maintenance Mode</label>
                </div>
            </div>
        </div>

        <!-- Branding -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Branding</h2>
            <div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Site Logo</label>
                    <div class="flex items-center gap-4">
                        <img src="https://via.placeholder.com/100x40" alt="Logo" class="h-10 w-auto rounded">
                        <button class="px-3 py-1 bg-teal-100 text-teal-600 rounded-md hover:bg-teal-200 transition-colors duration-200 text-sm">Upload New</button>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Favicon</label>
                    <div class="flex items-center gap-4">
                        <img src="https://via.placeholder.com/32" alt="Favicon" class="h-8 w-8 rounded">
                        <button class="px-3 py-1 bg-teal-100 text-teal-600 rounded-md hover:bg-teal-200 transition-colors duration-200 text-sm">Upload New</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Indivation -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact Indivation</h2>
            <div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" value="{{$email}}" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
                    <input type="text" value="{{$phone}}" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Address</label>
                    <input type="text" value="{{$address}}" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
        </div>
    </form>
</div>
