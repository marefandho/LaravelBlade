<!-- Top Bar -->
<header class="relative flex justify-between items-center bg-white border-b border-gray-200 px-6 h-16 z-20">
    <div x-data="{profileMenuOpen: false}" class="flex items-center gap-4 ml-auto relative">
        <div @click="profileMenuOpen = !profileMenuOpen"
        class="flex items-center space-x-2 text-gray-500 hover:cursor-pointer 
        hover:text-blue-700 group" >
            <x-fontisto-jenkins class="w-8 h-8" />
            <span class="text-sm font-medium text-gray-700 
            group-hover:text-blue-700">{{ auth()->user()->name }}</span>
            <x-fontisto-caret-left class="w-3 h-3" 
            x-bind:class="profileMenuOpen ? 'rotate-270' : ''" />
        </div>

        <div x-show="profileMenuOpen"
            @click.outside="profileMenuOpen = false"
            x-transition
            class="absolute right-0 top-full mt-2 w-48 bg-indigo-600 border 
            border-gray-200 rounded-lg shadow-lg">
            <ul class="py-2 text-sm text-white text-right">
                <li>
                    <button 
                        aria-placeholder="Change Password"
                        class="relative group text-white px-4 py-2 hover:bg-indigo-500 
                        rounded-sm cursor-pointer w-full text-right flex justify-end"
                        @click="window.dispatchEvent ( new CustomEvent ('open-modal', {
                            detail: {
                                title: 'Change Password',
                                type: 'changePassword',
                                content: '',
                                cancelText: 'Cancel',
                                confirmText: 'Confirm New Password',
                                confirmColor: 'blue',
                                actionURL: '{{ route('users.changePassword', auth()->user()->id) }}',
                                actionMethod: 'PUT'
                            }
                        }))"
                    >
                        <span>Change Password</span> <x-fluentui-password-20 class="w-6 ml-2 text-gray-300" />


                    </button>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex justify-end w-full text-right px-4 py-2 
                        hover:cursor-pointer hover:bg-indigo-500">
                            <span>Logout</span> <span><x-fluentui-sign-out-20 class="w-6 h-6 ml-2 text-gray-300" /></span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>