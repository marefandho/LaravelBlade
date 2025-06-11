{{-- resources/views/welcome.blade.php --}}

{{--
    Ini menunjukkan bahwa tampilan ini memperluas tata letak 'app' yang ditentukan
    di 'resources/views/components/app-layout.blade.php'. Semua konten dalam
    tag <x-app-layout> akan ditempatkan ke dalam variabel $slot tata letak.
--}}
<x-app-layout>
    <div class="text-center p-8 bg-white shadow-lg rounded-xl max-w-md w-full border border-gray-200">
        <h1 class="text-5xl font-extrabold text-blue-600 mb-4 animate-fade-in-down">
            Selamat Datang di Aplikasi Laravel Anda!
        </h1>
        <p class="text-xl text-gray-700 mb-6">
            Frontend ini dibangun dengan <span class="font-semibold text-green-500">Blade</span> dan distyle dengan <span class="font-semibold text-purple-500">Tailwind CSS</span>.
        </p>

        <div class="flex flex-col space-y-4">
            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                Jelajahi Aplikasi
            </a>
            <a href="https://laravel.com/docs" target="_blank" class="text-blue-500 hover:text-blue-700 text-sm transition duration-300 ease-in-out">
                Baca Dokumentasi Laravel
            </a>
            <a href="https://tailwindcss.com/docs" target="_blank" class="text-purple-500 hover:text-purple-700 text-sm transition duration-300 ease-in-out">
                Pelajari Tailwind CSS
            </a>
        </div>

        <div class="mt-8 text-xs text-gray-500">
            <p>&copy; 2025 {{ config('app.name', 'Laravel') }}. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </div>

    {{--
        Ini adalah blok CSS sederhana dalam file Blade untuk animasi tertentu.
        Untuk gaya yang lebih besar dan dapat digunakan kembali, Anda biasanya menambahkannya
        ke 'resources/css/app.css' atau file CSS khusus.
    --}}
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
