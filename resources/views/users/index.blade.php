<x-app-layout>
    <div x-data="modalHandler" class="relative">
        <div class="container mx-auto py-4">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h1 class="text-xl font-bold">Users</h1>
                    <p class="text-gray-600 text-sm">View and manage all users in your company, including their roles and business unit assignments.</p>
                </div>
                <a href="{{ route('users.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-semibold">
                    Add New User
                </a>
            </div>

            <div class="bg-white rounded shadow">
                <table class="min-w-full table-auto text-sm">
                    <thead>
                        <tr>
                            <th class="px-4 py-4 text-center w-[7%]">#</th>
                            <th class="px-4 py-4 text-left w-[30%]">Name</th>
                            <th class="px-4 py-4 text-left w-[12%]">Role</th>
                            <th class="px-4 py-4 text-left w-[36%]">BusinessUnit</th>
                            <th class="px-4 py-4 text-center w-[15%]">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-4 text-center">{{ $users->firstItem() + $index }}</td>
                                <td class="px-4 ">{{ $user->name }}</td>
                                <td class="px-4 ">{{ $user->role->label }}</td>
                                <td class="px-4 ">{{ $user->businessUnit?->name ?? 'N/A' }}</td>
                                <td class="px-4 py-1 flex space-x-2 justify-center">
                                    <a href="{{ route('users.edit', $user->id) }}" 
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
                                        aria-placeholder="Delete Business Unit"
                                        class="relative group text-white bg-red-600 p-1 rounded-sm
                                        hover:underline cursor-pointer hover:bg-red-800"
                                        @click="window.dispatchEvent ( new CustomEvent ('open-modal', {
                                            detail: {
                                                title: 'Delete User',
                                                content: 'Are you sure you want to delete <b>{{ $user->name }}</b> from your business unit?',
                                                cancelText: 'Cancel',
                                                confirmText: 'Delete',
                                                confirmColor: 'red',
                                                actionURL: '{{ route('users.destroy', $user->id) }}',
                                                actionMethod: 'DELETE'
                                            }
                                        }))"
                                    >
                                        <x-fluentui-delete-dismiss-28 class="w-4 h-4" />
                                        <span class="absolute left-1/2 -translate-x-1/2 top-full mt-1
                                                hidden group-hover:block bg-gray-200 
                                                text-gray-800 text-xs font-medium px-2 py-1 rounded shadow 
                                                whitespace-nowrap z-10">
                                            Delete Data
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-gray-200">
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                    No Users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>