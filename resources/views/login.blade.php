<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IsyaratKu | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" text-gray-900 bg-[#3a5a4f]">

<div class="flex flex-col md:flex-row w-full max-w-5xl min-h-[600px] mx-auto mt-8 rounded-lg overflow-hidden shadow-lg">
    <!-- Left side -->
    <div class="flex-1 bg-gradient-to-r from-[#1a3a33] to-[#7f9b82] p-10 flex flex-col items-center justify-center">
        <div class="bg-[#7f9b82]/40 rounded-xl p-8 w-full max-w-sm flex flex-col items-center">
            <h1 class="text-white text-3xl font-extrabold mb-3">IsyaratKu</h1>
            <p class="text-white font-semibold text-center mb-8 leading-relaxed">
                Join our course and develop<br/>your sign language skills.
            </p>
            <img src="https://storage.googleapis.com/a1aa/image/3eb4c09d-c03c-4863-2533-373967f83a96.jpg"
                 alt="Sign language"
                 class="w-[300px] h-[300px] object-cover rounded-md" draggable="false" />
        </div>
    </div>

    <!-- Right side -->
    <div class="flex-1 bg-white p-10 flex flex-col justify-center">
        <h2 class="text-[#1a3a33] font-extrabold text-3xl mb-1">Masuk</h2>
        <p class="text-[#1a3a33] font-semibold mb-8">Masuk untuk melanjutkan</p>

        <form action="{{ route('login') }}" method="POST" class="space-y-6 max-w-md w-full">
            @csrf

            <div>
                <label for="email" class="block text-[#1a3a33] font-semibold mb-1">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full border border-black rounded-md px-4 py-2 placeholder:text-[#7f9b82] focus:ring-2 focus:ring-yellow-400"
                       placeholder="Masukkan email mu">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-[#1a3a33] font-semibold mb-1">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                           class="w-full border border-black rounded-md px-4 py-2 pr-12 placeholder:text-[#7f9b82] focus:ring-2 focus:ring-yellow-400"
                           placeholder="Masukkan Password mu">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#7f9b82] hover:text-[#1a3a33]">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-yellow-400 text-[#1a3a33] font-extrabold py-3 rounded-md hover:bg-yellow-500 transition mb-1">
                Masuk
            </button>

            <p class="text-center text-[#1a3a33] mt-8 text-sm">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-extrabold hover:underline">Daftar disini</a>
            </p>
        </form>
    </div>
</div>

<script>
document.getElementById('togglePassword').addEventListener('click', function () {
    const password = document.getElementById('password');
    const icon = this.querySelector('i');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});
</script>

</body>
</html>
