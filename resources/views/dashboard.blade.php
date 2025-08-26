<x-app-layout>
    <div class="flex justify-center items-center text-center p-8 bg-white shadow-lg rounded-xl w-full h-full border border-gray-200">
        <div>
            <h1 class="text-4xl font-extrabold text-blue-600 mb-4 animate-fade-in-down">
                Selamat Datang di Aplikasi Laravel Anda!
            </h1>
            <p class="text-lg text-gray-700 mb-6">
                Frontend ini dibangun dengan <span class="font-semibold text-green-500">Blade</span> dan distyle dengan <span class="font-semibold text-purple-500">Tailwind CSS</span>.
            </p>
    
            <div class="flex flex-col space-y-2">
                <a href="https://laravel.com/docs" target="_blank" class="text-blue-500 hover:text-blue-700 text-sm transition duration-300 ease-in-out">
                    Baca Dokumentasi Laravel
                </a>
                <a href="https://tailwindcss.com/docs" target="_blank" class="text-purple-500 hover:text-purple-700 text-sm transition duration-300 ease-in-out">
                    Pelajari Tailwind CSS
                </a>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-6 text-center">
                @csrf
                <button type="submit" class="text-red-600 hover:underline cursor-pointer">Logout</button>
            </form>
    
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
