{{--
<aside class="w-64 bg-white border-r min-h-screen p-4">
    <nav class="space-y-4">
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
        </a>
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-newspaper mr-2"></i> Artikel
        </a>
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-question-circle mr-2"></i> Kuis
        </a>
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-chart-bar mr-2"></i> Laporan Kuis
        </a>
    </nav>
</aside> --}}

<aside class="w-64 bg-white border-r min-h-screen p-4">
    <nav class="space-y-4">
        <a href="{{ route('admin/dashboard') }}" class="block hover:text-blue-500">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
        </a>
        {{-- Link baru untuk Materi --}}
        <a href="{{ route('materi.index') }}" class="block hover:text-blue-500">
            <i class="fas fa-book-open mr-2"></i> Materi
        </a>
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-newspaper mr-2"></i> Artikel
        </a>
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-question-circle mr-2"></i> Kuis
        </a>
        <a href="#" class="block hover:text-blue-500">
            <i class="fas fa-chart-bar mr-2"></i> Laporan Kuis
        </a>
    </nav>
</aside>
