<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mPOS - Login</title>
    @vite('resources/css/app.css') {{-- Vite + Tailwind CSS --}}
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-xl rounded-2xl">
        <h1 class="text-3xl font-bold text-center text-gray-800">mPOS <span class="text-base">Authentication</span></h1>

        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="text-sm text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="off"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                    >
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                    >
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center text-sm">
                    <input type="checkbox" name="remember" class="form-checkbox rounded">
                    <span class="ml-2">Remember me</span>
                </label>

            </div>

            <div>
                <button
                    type="submit"
                    class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition"
                >
                    Login
                </button>
            </div>
        </form>
    </div>

</body>
</html>
