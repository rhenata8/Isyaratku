@php
    $adminId = session('admin_id');
    $admin = \App\Models\M_Akun_Admin::find($adminId);
@endphp

<div class="bg-[#003B2C] text-white px-6 py-4 flex justify-between items-center fixed top-0 left-0 w-full z-50 h-[72px]">
    <h1 class="text-xl font-bold">IsyaratKu</h1>
    <div class="flex items-center gap-2">
        @if($admin)
            <img
                src="{{ $admin->foto ? asset('storage/foto/' . $admin->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($admin->nama_lengkap) }}"
                alt="Foto Admin"
                class="w-10 h-10 rounded-full object-cover">
            <span class="font-semibold">{{ $admin->nama_lengkap }}</span>
        @else
            <span class="font-semibold">Admin</span>
        @endif
    </div>
</div>
