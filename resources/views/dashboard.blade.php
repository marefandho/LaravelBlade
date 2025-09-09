<x-app-layout>
    <div class="flex justify-center items-center text-center p-8 bg-white shadow-lg rounded-xl w-full h-full border border-gray-200">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-700 mb-1 animate-fade-in-down">
                Welcome to <span class="text-indigo-600 text-5xl">mStore</span>
            </h1>
            <p class="text-lg text-gray-700 mb-6">
                Smart and reliable POS to manage your business with ease
            </p>
    
            <div class="mt-8 text-xs text-gray-500">
                <p>&copy; 2025 {{ config('app.name', 'Laravel') }}. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fadeInDown 1s ease-out;
        }
    </style>
</x-app-layout>
