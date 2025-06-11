{{-- resources/views/components/app-layout.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--
        Arahan @vite sangat penting untuk memuat aset yang dikompilasi
        (termasuk Tailwind CSS Anda). Ini dengan cerdas menangani keduanya
        pengembangan (dengan server dev Vite) dan build produksi.
    --}}
    @vite('resources/css/app.css')

    {{-- Anda dapat menautkan font eksternal atau CDN lainnya di sini jika diperlukan --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased text-gray-900 leading-normal">
    {{--
        Ini adalah slot komponen Blade. Konten dari tampilan yang
        menggunakan tata letak ini (misalnya, `welcome.blade.php`) akan
        disuntikkan di mana `$slot` berada.
    --}}
    <div class="min-h-screen flex flex-col items-center justify-center py-12 bg-gray-100">
        {{ $slot }}
    </div>

    {{--
        Sertakan file JavaScript utama Anda. Meskipun Anda tidak banyak menggunakan JS
        untuk interaktivitas, merupakan praktik yang baik untuk menyertakan app.js jika Anda memilikinya.
    --}}
    @vite('resources/js/app.js')
</body>
</html>
