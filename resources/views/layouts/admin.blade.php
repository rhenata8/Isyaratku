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
    @include('components.navbar_admin')
    <header class="bg-[#0B3B2E] text-white flex items-center justify-between px-6 py-4">
        <h1 class="text-3xl font-bold">Isyaratku</h1>

        {{-- Bagian Profil Admin di Header --}}
        {{-- <h1 class="text-3xl font-bold">Isyaratku</h1> --}}
        <div class="ml-auto">
            <a href="{{ route('admin/profile') }}">
                <img src="https://ui-avatars.com/api/?name=Admin" alt="Profile"
                    class="w-12 h-12 rounded-full object-cover">
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
