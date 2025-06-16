<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#F0F7F0]">

    {{-- Header --}}
    <header class="bg-[#0B3B2E] text-white flex items-center justify-between px-6 py-4">
        <h1 class="text-3xl font-bold">Isyaratku</h1>

        {{-- Bagian Profil Admin di Header --}}
        <div class="ml-auto flex items-center gap-2"> {{-- Tambahkan flex dan items-center --}}
            {{-- Tampilkan nama admin jika ada --}}
            <span class="text-white font-medium text-lg mr-2">
                {{ $admin ? $admin->nama_lengkap : 'Guest' }}
            </span>

            {{-- Link ke halaman profil admin --}}
            <a href="{{ route('admin/profile') }}"> {{-- Pastikan menggunakan notasi titik: admin.profile --}}
                @if ($admin && $admin->foto)
                    {{-- Tampilkan foto dari storage --}}
                    <img src="{{ asset('storage/foto/' . $admin->foto) }}" alt="Foto Profil"
                         class="w-12 h-12 rounded-full object-cover shadow">
                @else
                    {{-- Tampilkan avatar default jika tidak ada foto atau admin tidak ditemukan --}}
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($admin ? $admin->nama_lengkap : 'Admin') }}&background=EBF4FF&color=7F9CF5&size=128" alt="Profil Default"
                         class="w-12 h-12 rounded-full object-cover shadow">
                @endif
            </a>
        </div>
    </header>

    {{-- Body - Konten Utama dan Sidebar --}}
    <div class="flex min-h-screen overflow-hidden">
        {{-- Sidebar --}}
        @include('components/admin/sidebar')

        {{-- Main Content --}}
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
