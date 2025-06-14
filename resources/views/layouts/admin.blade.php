<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IsyaratKu - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#F0F1E9] text-[#1B1B1B]">

    {{-- Navbar Admin --}}
    @hasSection('navbar')
        @yield('navbar')
    @else
        @include('components.navbar_admin')
    @endif

    {{-- Konten --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @hasSection('footer')
        @yield('footer')
    @else
        @include('components.footer')
    @endif

</body>

</body>
</html>
