<x-app-layout>
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Company Profile
    </h2>

    <div class="py-4">
        <div class="">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('company.update') }}" class="space-y-8 text-gray-600 text-sm">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block  font-medium text-gray-700">
                            Company Name
                        </label>
                        <input type="text" name="name" id="name" 
                            value="{{ old('name', $company->name ?? '') }}"
                            autocomplete="off"
                            required autofocus
                            class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                            focus:border-blue-400/50 focus:outline-0" >

                    </div>

                    <div>
                        <label for="address" class="block font-medium text-gray-700">
                            Company Address
                        </label>
                        <textarea name="address" id="address" rows="3"
                            class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                            focus:border-blue-400/50 focus:outline-0" >{{ old('address', $company->address ?? '') }}</textarea>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Update Company
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>