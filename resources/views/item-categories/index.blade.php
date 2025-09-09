<x-app-layout>
    <div x-data="modalHandler" class="relative">
        <div class="container mx-auto py-4">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h1 class="text-xl font-bold">Item Categories</h1>
                    <p class="text-gray-600 text-sm">All your item categories in one place. Quickly add, edit, or organize them as needed.</p>
                </div>
                <a href="{{ route('item-categories.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                    Add New Category
                </a>
            </div>

            <div class="bg-white rounded shadow">
                <table class="min-w-full table-auto text-sm">
                    <thead>
                        <tr>
                            <th class="px-4 py-4 text-center w-[7%]">#</th>
                            <th class="px-4 py-4 text-left w-[30%]">Category Name</th>
                            <th class="px-4 py-4 text-center w-[15%]">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($itemCategories as $index => $category)
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-4 text-center">{{ $itemCategories->firstItem() + $index }}</td>
                                <td class="px-4 ">{{ $category->name }}</td>
                                <td class="px-4 py-1 flex space-x-2 justify-center">
                                    <a href="{{ route('item-categories.edit', $category->id) }}" 
                                        class="relative group text-white bg-blue-600 p-1 rounded-sm hover:bg-blue-800">
                                        <x-fluentui-clipboard-edit-20 class="w-4 h-4" />
                                        <span class="absolute left-1/2 -translate-x-1/2 top-full mt-1
                                                    hidden group-hover:block bg-gray-200 
                                                    text-gray-800 text-xs font-medium px-2 py-1 rounded shadow 
                                                    whitespace-nowrap z-10">
                                            Edit Data
                                        </span>
                                    </a>                                
                                    <button 
                                        aria-placeholder="Delete Item Category"
                                        class="relative group text-white bg-red-600 p-1 rounded-sm
                                        hover:underline cursor-pointer hover:bg-red-800"
                                        @click="window.dispatchEvent ( new CustomEvent ('open-modal', {
                                            detail: {
                                                title: 'Delete Item Category',
                                                content: 'Are you sure you want to delete <b>{{ $category->name }}</b> from list?',
                                                cancelText: 'Cancel',
                                                confirmText: 'Delete',
                                                confirmColor: 'red',
                                                actionURL: '{{ route('item-categories.destroy', $category->id) }}',
                                                actionMethod: 'DELETE'
                                            }
                                        }))"
                                    >
                                        <x-fluentui-delete-dismiss-28 class="w-4 h-4" />
                                        <span class="absolute left-1/2 -translate-x-1/2 top-full mt-1
                                                hidden group-hover:block bg-gray-200 
                                                text-gray-800 text-xs font-medium px-2 py-1 rounded shadow 
                                                whitespace-nowrap z-10">
                                            Delete Item Category
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-gray-200">
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                    No Item Categories found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $itemCategories->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>