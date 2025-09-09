<x-app-layout>
  <div class="container mr-auto py-4 w-1/2">
    <div class="mb-4">
        <h2 class="text-xl font-bold">
            {{ isset($user) ? 'Edit Existing User' : 'Create New User' }}
        </h2>
        <p class="text-sm">
            {{ isset($user) ? 
                'Modify the user’s profile to keep information accurate and up to date' : 
                'Create a new account with the required user information and access level' }}
        </p>
    </div>

    <form method="POST"
        action="{{ 
            isset($user) ? 
            route('users.update', $user->id) : 
            route('users.store') 
        }}"
        class="bg-white rounded shadow p-6 space-y-4 text-sm"
        novalidate
        x-data="{ 
            name: '{{ old('name', $user->name ?? '') }}', 
            email: '{{ old('email', $user->email ?? '') }}',
            role_id: '{{ old('role_id', $user->role_id ?? '') }}',
            business_unit_id: '{{ old('business_unit_id', $user->business_unit_id ?? '') }}',
            errors: {
                name: '{{ $errors->first('name') }}',
                email: '{{ $errors->first('email') }}',
                role_id: '{{ $errors->first('role_id') }}',
                business_unit_id: '{{ $errors->first('business_unit_id') }}',
            }
        }"
    >
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">User Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
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
            <label class="block text-gray-700 font-medium mb-2">User Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                    focus:border-blue-400/50 focus:outline-0"
                required autofocus
                x-model="email"
                autocomplete="off"
                @input="errors.email = ''"
            >
            <template x-if="errors.email">
                <p class="text-red-500 text-sm mt-1" x-text="errors.email"></p>
            </template>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-3">User Role</label>
            <select name="role_id" x-model="role_id"
                class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                    focus:border-blue-400/50 focus:outline-0 has-[option:disabled:checked]:text-gray-400"
                required
            >
                <option value="" disabled hidden {{ !isset($user) ? 'selected' : '' }}>-- Select Role for this User --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ (isset($user) && $user->role_id == $role->id) || old('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->label }}
                    </option>
                @endforeach
            </select>
            @error('role_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <template x-if="role_id !== '{{ config('app.super_admin_role_id') }}'">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-3">Business Unit</label>
                <select name="business_unit_id"
                    class="mt-1 block w-full border-b-[2px] border-gray-200 focus:ring-0 
                        focus:border-blue-400/50 focus:outline-0 has-[option:disabled:checked]:text-gray-400"
                    required
                >   
                    <option value="" disabled hidden {{ !isset($user) || $user->business_unit_id === null ? 'selected' : '' }}>-- Select Business Unit for this User --</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}"
                            {{ (isset($user) && $user->business_unit_id === $unit->id) || old('business_unit_id') == $unit->id ? 'selected' : '' }}>
                            {{ $unit->name }}
                        </option>
                    @endforeach
                </select>
                @error('business_unit_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </template>

        <!-- Submit -->
        <div class="flex justify-end">
            <a href="{{ route('users.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</a>
            @if(isset($user) && $user->id)
                <form method="POST" action="{{ route('users.resetPassword', $user->id) }}" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" name="user_id" 
                        class="px-4 py-2 ml-2 text-white bg-orange-600 rounded-md 
                        hover:bg-orange-800 hover:cursor-pointer">Reset Password</button>  
                </form>
            @endif
            <button type="submit"
                    class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-800 hover:cursor-pointer">
                {{ isset($user) ? 'Update Existing User' : 'Save New User' }}
            </button>
        </div>
        <div class="text-xs text-gray-600 mt-5">
            <span class="font-bold">Important Notes:</span>
            <ul>
                <li class="list-disc">Password is automatically set to <b>'password'</b> upon creation.</li>
                <li class="list-disc">This page is accessible only by super admins. Be careful when assigning or changing user roles.</li>
            </ul>
        </div>
    </form>
  </div>
</x-app-layout>