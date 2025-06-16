<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F0F7F0]">

    {{-- Header --}}
    <header class="bg-[#0B3B2E] text-white flex items-center justify-between px-6 py-4">
        <h1 class="text-3xl font-bold">Isyaratku</h1>
        <div class="ml-auto">
            <a href="{{ route('admin/profile') }}">
                <img src="https://ui-avatars.com/api/?name=Admin" alt="Profile"
                    class="w-12 h-12 rounded-full object-cover">
            </a>
        </div>
    </header>

    {{-- Body --}}
    <div class="flex min-h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside class="w-64 bg-[#0B3B2E] text-white flex flex-col px-6 py-8 space-y-6">
            <nav class="space-y-4 text-sm">
                <a href="#" class="block hover:text-[#FFB800]">Kelola Kursus</a>
                <a href="#" class="block hover:text-[#FFB800]">Kelola Quiz</a>
                <a href="#" class="block hover:text-[#FFB800]">Kelola Artikel</a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-10 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
