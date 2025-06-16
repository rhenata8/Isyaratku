<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10 px-4">

<div class="w-full max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Profil Admin</h1>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-4 text-red-600">{{ session('error') }}</div>
    @endif

    {{-- Foto Profil --}}
    @if ($admin->foto)
        <div class="mb-6 flex flex-col items-center">
            <img src="{{ asset('storage/foto/' . $admin->foto) }}" alt="Foto Profil"
                 class="w-32 h-32 rounded-full object-cover shadow mb-2">
        </div>
    @else
        <div class="mb-6 flex justify-center">
            <div class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 shadow">
                Tidak Ada Foto
            </div>
        </div>
    @endif

    {{-- Nama --}}
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <p class="text-gray-900">{{ $admin->nama_lengkap }}</p>
    </div>

    {{-- Email --}}
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <p class="text-gray-900">{{ $admin->email }}</p>
    </div>

    {{-- No. Telepon --}}
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
        <p class="text-gray-900">{{ $admin->phone ?? '-' }}</p>
    </div>

    {{-- Aksi --}}
    <div class="mt-6 flex gap-4 flex-wrap">
        <a href="{{ route('admin/profile.edit') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition"> {{-- UBAH INI --}}
            Ubah Profil
        </a>
        <a href="{{ route('admin/dashboard') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition"> {{-- UBAH INI --}}
            Kembali
        </a>
        {{-- Tombol Logout perlu form POST --}}
        <form action="{{ route('logout') }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>
</div>

</body>
</html>
