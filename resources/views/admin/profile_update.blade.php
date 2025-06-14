<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Profil - IsyaratKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">


    {{-- Konten --}}
    <main class="flex-1">
        <div class="w-full max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Ubah Profil</h1>

            @if (session('success'))
                <div id="alert-success" class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div id="alert-error" class="mb-4 p-2 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
            @endif

            {{-- Foto Profil Preview dan Hapus (di luar form utama) --}}
            @if ($admin->foto)
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('storage/foto/' . $admin->foto) }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover">
                <form id="hapus-foto-form" action="{{ route('admin/profile.delete_foto') }}" method="POST" class="inline ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="ajaxHapusFoto(event)" class="px-2 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700 ml-2">Hapus Foto</button>
                </form>
            </div>
            @endif

            <form id="profile-update-form" action="{{ route('admin/profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                {{-- Upload Foto --}}
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto Profil</label>
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

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        value="{{ old('email', $admin->email) }}"
                        class="mt-1 w-full border rounded p-2 bg-gray-100">
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
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <div class="flex gap-4 mt-6">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
                    <a href="{{ route('admin/profile') }}" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">Batal</a>
                    {{-- <a href="{{ route('admin.profile') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                        Kembali
                    </a> --}}
                </div>
            </form>
        </div>
    </main>

    <script>
        // AJAX untuk hapus foto
        function ajaxHapusFoto(e) {
            e.preventDefault();
            if (!confirm('Apakah yakin ingin menghapus foto?')) {
                tampilkanAlert('Foto profil batal dihapus.', false);
                return;
            }
            const form = document.getElementById('hapus-foto-form');
            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
                    'Accept': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    tampilkanAlert(data.success, true);
                    // Hilangkan foto dan tombol hapus
                    document.querySelector('#hapus-foto-form').parentElement.style.display = 'none';
                    const img = document.querySelector('img[alt="Foto Profil"]');
                    if (img) img.remove();
                } else if (data.error) {
                    tampilkanAlert(data.error, false);
                }
            })
            .catch(() => tampilkanAlert('Terjadi kesalahan saat menghapus foto.', false));
        }

        // AJAX untuk update profil
        const profileForm = document.getElementById('profile-update-form');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(profileForm);
                fetch(profileForm.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': profileForm.querySelector('[name=_token]').value,
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        tampilkanAlert(data.success, true);
                        // Jika ada foto baru, update preview foto
                        if (data.foto_url) {
                            let img = document.querySelector('img[alt="Foto Profil"]');
                            if (!img) {
                                // Jika belum ada img, buat baru
                                img = document.createElement('img');
                                img.alt = 'Foto Profil';
                                img.className = 'w-24 h-24 rounded-full object-cover';
                                const previewDiv = document.createElement('div');
                                previewDiv.className = 'flex items-center gap-4 mb-4';
                                previewDiv.appendChild(img);
                                profileForm.parentElement.insertBefore(previewDiv, profileForm);
                            }
                            img.src = data.foto_url + '?t=' + new Date().getTime(); // force reload
                        }
                    } else if (data.error) {
                        tampilkanAlert(data.error, false);
                    } else if (data.errors) {
                        tampilkanAlert(Object.values(data.errors).join('\n'), false);
                    }
                })
                .catch(() => tampilkanAlert('Terjadi kesalahan saat update profil.', false));
            });
        }

        function tampilkanAlert(pesan, sukses) {
            let alert = document.getElementById('alert-success') || document.getElementById('alert-error');
            if (alert) alert.remove();
            const div = document.createElement('div');
            div.id = sukses ? 'alert-success' : 'alert-error';
            div.className = 'mb-4 p-2 rounded ' + (sukses ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800');
            div.innerText = pesan;
            document.querySelector('main').prepend(div);
        }
    </script>
</body>
</html>
