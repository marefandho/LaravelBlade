<div
    x-data="modalHandler"
    x-init="init()"
    x-show="isOpen"
    x-cloak 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-lg font-bold text-gray-800 mb-4" x-text="title"></h2>
        <p class="text-sm text-gray-600 mb-4" x-html="content"></p>

        <div class="flex justify-end space-x-2">
            <template x-if="cancelText">
                <button @click="closeModal" 
                    class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"
                    x-text="cancelText"
                ></button>
            </template>
            <template x-if="actionURL">
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
            <template x-if="!actionURL">
                <button @click="closeModal" 
                    class="px-3 py-1  text-white rounded"
                    :class="`bg-${confirmColor}-600 hover:bg-${confirmColor}-700`"
                    x-text="confirmText"></button>
            </template>
        </div>
    </div>
</div>