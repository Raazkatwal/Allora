<div class="p-6 bg-gray-50 rounded-xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800">All Products</h2>
        <button wire:click="openModal('add')" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors duration-200 flex items-center gap-2 cursor-pointer">
            <x-lucide-plus class="w-5 h-5" /> Add
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto bg-white rounded-lg shadow-md">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4 text-center text-sm font-semibold">ID</th>
                    <th class="p-4 text-center text-sm font-semibold">Name</th>
                    <th class="p-4 text-center text-sm font-semibold">Category</th>
                    <th class="p-4 text-center text-sm font-semibold">Price</th>
                    <th class="p-4 text-center text-sm font-semibold">Stock</th>
                    <th class="p-4 text-center text-sm font-semibold">Active</th>
                    <th class="p-4 text-center text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($products as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="p-4 text-gray-700 text-center">{{ $loop->iteration }}</td>
                        <td class="p-4 text-gray-700 text-center">{{ $item->name }}</td>
                        <td class="p-4 text-gray-700 text-center">{{ $item->category->name }}</td>
                        <td class="p-4 text-gray-700 text-center">${{ number_format($item->price, 2) }}</td>
                        <td class="p-4 text-gray-700 text-center">{{ rand(0, 150) }}</td>
                        <td class="p-4 text-gray-700 text-center"><flux:switch wire:model="test"/></td>
                        <td class="p-4 flex gap-2 justify-center">
                            <button wire:click="openModal('view', {{ $item->id }})" class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-200 transition-colors duration-200 text-sm cursor-pointer">
                                View
                            </button>
                            <button wire:click="setView('edit', {{ $item->id }})" class="px-3 py-1 bg-teal-100 text-teal-600 rounded-md hover:bg-teal-200 transition-colors duration-200 text-sm cursor-pointer">
                                Edit
                            </button>
                            <button wire:click="openModal('delete', {{ $item->id }})" class="px-3 py-1 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors duration-200 text-sm cursor-pointer">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
