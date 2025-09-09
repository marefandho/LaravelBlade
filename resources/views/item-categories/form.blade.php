<x-app-layout>
  <div class="container mr-auto py-4 w-1/2">
    <div class="mb-4">
        <h2 class="text-xl font-bold">
            {{ isset($itemCategory) ? 'Edit Item Brand' : 'Create Item Brand' }}
        </h2>
        <p class="text-sm">
            {{ isset($itemCategory) ? 
                'Modify the category details to ensure your items remain well-organized.' : 
                'Fill in the details below to define a new category. Well-organized categories improve item management.' }}
        </p>
    </div>

    <form method="POST"
        action="{{ 
            isset($itemCategory) ? 
            route('item-categories.update', $itemCategory->id) : 
            route('item-categories.store') 
        }}"
        class="bg-white rounded shadow p-6 space-y-4 text-sm"
        novalidate
        x-data="{ 
            name: '{{ old('name', $itemCategory->name ?? '') }}', 
            errors: {
                name: '{{ $errors->first('name') }}',
            }
        }"
    >
        @csrf
        @if(isset($itemCategory))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Item Category Name</label>
            <input type="text" name="name" value="{{ old('name', $itemCategory->name ?? '') }}"
                class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                    focus:border-blue-400/50 focus:outline-0"
                required autofocus
                x-model="name"
                autocomplete="off"
                @input="errors.name = ''"
            >
            <template x-if="errors.name">
                <p class="text-red-500 text-sm mt-1" x-text="errors.name"></p>
            </template>
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <a href="{{ route('item-categories.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</a>
            <button type="submit"
                    class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                {{ isset($itemCategory) ? 'Update Existing Data' : 'Save New Category' }}
            </button>
        </div>
    </form>
  </div>
</x-app-layout>