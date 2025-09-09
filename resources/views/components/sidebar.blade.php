@php
    $setupActive = request()->routeIs('company.*') || 
    request()->routeIs('business-units.*') || request()->routeIs('users.*');
@endphp
<aside 
    x-data="{ 
        collapse: false,
        openMenus: { item: false, setup: {{ $setupActive ? 'true' : 'false' }} } 
    }" 
    :class="collapse ? 'w-26':'w-64'"
    class="bg-indigo-600 text-white flex flex-col py-4">
    <div class="h-16 flex items-center justify-center text-2xl font-bold">
        <div x-show="!collapse" class="flex flex-row items-center space-x-2">
            <x-fontisto-shopify class="w-12 h-12" /><span>mPOS</span>
        </div>
        <span x-show="collapse" x-transition class="ml-2">mPOS</span>
    </div>
    <button 
        @click="
            collapse = !collapse; 
            openMenus.item= false; 
            openMenus.setup= false" 
        class="mx-2 my-2 p-2 bg-indigo-500 hover:bg-indigo-400 rounded"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
    </button>

    <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
            class="flex items-center gap-2 px-3 py-2 rounded hover:bg-indigo-500
            {{ request()->routeIs('dashboard') ? 'bg-indigo-700 text-white' : 'text-indigo-200' }}">
            <x-heroicon-m-home class="w-6 h-6" />
            <span x-show="!collapse">Dashboard</span>
        </a>
        <div>
            <button @click="openMenus.item = !openMenus.item; collapse = false"
                    class="flex items-center w-full gap-2 px-3 py-2 rounded hover:bg-indigo-500 
                    cursor-pointer">
                <x-fontisto-redis class="w-6 h-6" />
                <span x-show="!collapse">Items</span>
                <x-heroicon-s-chevron-right :class="openMenus.item ? 'rotate-90' : ''" class="w-4 h-4 ml-auto transform transition-transform" />
            </button>
            <div x-show="openMenus.item" x-collapse class="ml-6 mt-1 space-y-1 text-sm text-indigo-200">
                <a href="{{ route('brands.index') }}" class="block px-3 py-1 rounded hover:bg-indigo-500">Brand</a>
                <a href="{{ route('item-categories.index') }}" class="block px-3 py-1 rounded hover:bg-indigo-500">Category</a>
                <a href="#" class="block px-3 py-1 rounded hover:bg-indigo-500">Listed Items</a>
            </div>
        </div>
        
        @can('manage-setup')
            <div>
                <button @click="openMenus.setup = !openMenus.setup; collapse = false"
                        class="flex items-center w-full gap-2 px-3 py-2 rounded hover:bg-indigo-500 
                        cursor-pointer {{ $setupActive ? 'bg-indigo-700 text-white' : '' }}">
                    <x-heroicon-c-cog-8-tooth class="w-6 h-6" />
                    <span x-show="!collapse">Setup</span>
                    <x-heroicon-s-chevron-right :class="openMenus.setup ? 'rotate-90' : ''" class="w-4 h-4 ml-auto transform transition-transform" />
                </button>
                <div x-show="openMenus.setup" x-collapse class="ml-6 mt-1 space-y-1 text-sm text-indigo-200">
                    <a href="{{ route('company.edit') }}" class="block px-3 py-1 rounded hover:bg-indigo-500
                    {{ request()->routeIs('company.edit') ? 'bg-indigo-700 text-white' : 'text-indigo-200' }}">Companies</a>
                    <a href="{{ route('business-units.index') }}" 
                        class="block px-3 py-1 rounded hover:bg-indigo-500
                        {{ request()->routeIs('business-units.index') ? 'bg-indigo-700 text-white' : 'text-indigo-200' }}">
                        Business Unit
                    </a>
                    <a href="{{ route('users.index') }}" 
                        class="block px-3 py-1 rounded hover:bg-indigo-500
                        {{ request()->routeIs('users.index') ? 'bg-indigo-700 text-white' : 'text-indigo-200' }}">Users</a>
                </div>
            </div>
        @endcan
    </nav>
</aside>