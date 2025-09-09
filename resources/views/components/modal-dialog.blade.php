<div
    x-data="modalHandler"
    x-init="init()"
    x-show="isOpen"
    x-cloak 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md" 
    x-data="{ showPassword: false, showRetype: false, nPassword: '', rPassword: '' }">
        <h2 class="text-lg font-bold text-gray-800 mb-4" x-text="title"></h2>
        <template x-if="type === 'changePassword'">
            <form method="POST" :action="actionURL" class="space-y-0"
            @submit.prevent="if(nPassword === rPassword) $el.submit()">
                @csrf
                @method('PUT')
                <div class="border border-gray-300 px-3 py-2 relative">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input id="new_password" name="new_password" class="w-full py-1 block
                    focus:outline-none text-sm" placeholder="Enter new password here" required
                    :type="showPassword ? 'text' : 'password'" x-model="nPassword" />
                    <button type="button" @click="showPassword = !showPassword" class="absolute 
                    inset-y-0 right-0 flex items-center px-2 text-gray-400 cursor-pointer"
                    tabindex="-1">
                        <x-heroicon-c-eye class="h-6 w-6" x-show="!showPassword" />
                        <x-heroicon-c-eye-slash class="h-6 w-6" x-show="showPassword" />
                    </button>
                </div>
                <div class="border border-gray-300 border-t-0 px-3 py-2 relative">
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Retype New Password</label>
                    <input id="new_password_confirmation" name="new_password_confirmation" class="w-full py-1 
                    focus:outline-none text-sm" placeholder="Retype new password here" required
                    :type="showRetype ? 'text' : 'password'" x-model="rPassword" />
                    <button type="button" @click="showRetype = !showRetype" class="absolute 
                    inset-y-0 right-0 flex items-center px-2 text-gray-400 cursor-pointer"
                    tabindex="-1">
                        <x-heroicon-c-eye class="h-6 w-6" x-show="!showRetype" />
                        <x-heroicon-c-eye-slash class="h-6 w-6" x-show="showRetype" />
                    </button>
                </div>
                <p class="text-sm text-red-600 mt-1" x-show="nPassword && rPassword && nPassword !== rPassword">
                    Passwords do not match.
                </p>
                <div class="mt-4 text-right">
                    <button @click="nPassword = rPassword = ''; showPassword = showRetype =false; closeModal();" 
                        class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 cursor-pointer"
                        x-text="cancelText"
                    ></button>
                    <button type="submit" 
                            class="px-3 py-1 text-white rounded cursor-pointer"
                            :class="nPassword !== rPassword || nPassword === '' 
                            ? 'bg-gray-400 cursor-not-allowed'
                            : `bg-${confirmColor}-600 hover:bg-${confirmColor}-700`"
                            x-text="confirmText"
                            disabled="bg-gray-400 cursor-not-allowed"
                            :disabled="nPassword !== rPassword || nPassword === ''"></button>
                </div>
            </form>
        </template>

        <template x-if="type !== 'changePassword'"> 
            <p class="text-sm text-gray-600 mb-4" x-html="content"></p>
        </template>

        <div class="flex justify-end space-x-2">
            <template x-if="cancelText && type !== 'changePassword'">
                <button @click="closeModal();" 
                    class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"
                    x-text="cancelText"
                ></button>
            </template>
            <template x-if="actionURL && type !== 'changePassword'">
                <form :action="actionURL" method="POST">
                    @csrf
                    <template x-if="actionMethod !== 'POST'">
                        <input type="hidden" name="_method" :value="actionMethod">
                    </template>
                    <button type="submit" 
                        class="px-3 py-1 text-white rounded"
                        :class="`bg-${confirmColor}-600 hover:bg-${confirmColor}-700`"
                        x-text="confirmText"></button>
                </form>
            </template>
            <template x-if="!actionURL && type !== 'changePassword'">
                <button @click="closeModal();" 
                    class="px-3 py-1  text-white rounded"
                    :class="`bg-${confirmColor}-600 hover:bg-${confirmColor}-700`"
                    x-text="confirmText"></button>
            </template>
        </div>
    </div>
</div>