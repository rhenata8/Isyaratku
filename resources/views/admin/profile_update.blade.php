<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Profil Admin - IsyaratKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <main class="flex-1">
        <div class="w-full max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Ubah Profil Admin</h1>

            @if (session('success'))
                <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-2 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-2 bg-red-100 text-red-800 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Foto Profil Preview dan Hapus --}}
            @if ($admin->foto)
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('storage/foto/' . $admin->foto) }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover">
                <form action="{{
                ('admin.profile.delete_foto') }}" method="POST" class="inline-block"> {{-- UBAH INI --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus foto?')" class="px-2 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700 ml-2">Hapus Foto</button>
                </form>
            </div>
            @else
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs">No Photo</div>
                </div>
            @endif

            <form id="profile-update-form" action="{{ route('admin/profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4"> {{-- UBAH INI --}}
                @csrf
                @method('PUT')
                {{-- Upload Foto --}}
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto Profil Baru (Opsional)</label>
                    <input type="file" id="foto" name="foto"
                        class="mt-1 block w-full border-gray-300 shadow-sm rounded-md">
                </div>

                {{-- Nama Lengkap --}}
                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required
                        value="{{ old('nama_lengkap', $admin->nama_lengkap) }}"
                        class="mt-1 w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                </div>

                {{-- Email (Readonly) --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" readonly
                        value="{{ old('email', $admin->email) }}"
                        class="mt-1 w-full border rounded p-2 bg-gray-200 cursor-not-allowed">
                </div>

                {{-- Nomor Telepon --}}
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                    <input type="text" name="phone" id="phone"
                        value="{{ old('phone', $admin->phone) }}"
                        class="mt-1 w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                </div>

                {{-- Password Baru --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru (Kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <div class="flex gap-4 mt-6">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan Perubahan</button>
                    <a href="{{ route('admin/profile') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Batal</a> {{-- UBAH INI --}}
                </div>
            </form>
        </div>
    </main>

</body>
</html>
