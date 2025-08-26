<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <x-sidebar />
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="flex justify-between items-center bg-white border-b border-gray-200 px-6 h-16">
                <div class="flex items-center gap-4 ml-auto">
                    <div class="flex items-center space-x-2">
                        <x-fontisto-jenkins class="w-8 h-8 text-gray-500" />
                        <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                        <x-fontisto-caret-down class="w-3 h-3 text-gray-500" />
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6 bg-gray-50 overflow-y-auto flex-1 w-full">
                @if ($errors->any())
                   <x-alert-message type="error" :message="$errors->first()" />
               @elseif (session('success'))
                   <x-alert-message type="success" :message="session('success')" />
               @endif
                {{ $slot }}
            </main>
        </div>
    </div>
    <x-modal-dialog />

    @vite('resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/modalHandler.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
