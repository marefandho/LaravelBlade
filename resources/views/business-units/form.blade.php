<x-app-layout>
  <div class="container mr-auto py-4 w-1/2">
    <div class="mb-4">
        <h2 class="text-xl font-bold">
            {{ isset($units) ? 'Edit Business Unit' : 'Create Business Unit' }}
        </h2>
        <p class="text-sm">
            {{ isset($units) ? 
                'Review and update the information for this business unit as needed' : 
                'Fill in the required details to set up a new business unit for your company' }}
        </p>
    </div>

    <form method="POST"
        action="{{ 
            isset($units) ? 
            route('business-units.update', $units->id) : 
            route('business-units.store') 
        }}"
        class="bg-white rounded shadow p-6 space-y-4 text-sm"
        novalidate
        x-data="{ 
            name: '{{ old('name', $units->name ?? '') }}', 
            address: '{{ old('address', $units->address ?? '') }}',
            errors: {
                name: '{{ $errors->first('name') }}',
                address: '{{ $errors->first('address') }}'
            }
        }"
    >
        @csrf
        @if(isset($units))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Business Unit Name</label>
            <input type="text" name="name" value="{{ old('name', $units->name ?? '') }}"
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

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Business Unit Address</label>
            <textarea name="address"
                class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                    focus:border-blue-400/50 focus:outline-0"
                rows="3"
                x-model="address"
                @input="errors.address=''">{{ old('address', $units->address ?? '') }}</textarea>
            <template x-if="errors.description">
                <p class="text-red-500 text-sm mt-1" x-text="errors.address"></p>
            </template>
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <a href="{{ route('business-units.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</a>
            <button type="submit"
                    class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                {{ isset($units) ? 'Update Existing Data' : 'Save New Business Unit' }}
            </button>
        </div>
    </form>
  </div>
</x-app-layout>