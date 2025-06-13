<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-white min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white shadow-xl rounded-xl overflow-hidden">
        <!-- Header dengan kreasi -->
        <div class="text-center p-6 px-4 bg-gradient-to-r from-indigo-50 to-purple-50">
            <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-white text-indigo-600 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold text-gray-800 mb-2">
                Login ke Aplikasi
            </h1>
            <p class="text-sm text-gray-500">Silakan masuk menggunakan akun operator Anda</p>
        </div>

        <!-- Form Section -->
        <div class="">
            <x-form.form-container action="{{ route('login') }}" method="POST">
                <x-form.form-input
                    name="username"
                    label="Username"
                    type="text"
                    placeholder="Masukkan username"
                    required />

                <x-form.form-input
                    name="password"
                    label="Password"
                    type="password"
                    placeholder="Masukkan password"
                    required />

                <x-slot name="buttons">
                    <x-form.form-button type="submit" class="w-full justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded-lg shadow-md transition duration-200">
                        Login
                    </x-form.form-button>
                </x-slot>
            </x-form.form-container>
        </div>

    </div>

</body>
</html>
