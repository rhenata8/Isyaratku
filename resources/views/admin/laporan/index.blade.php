@extends('layouts.admin')

@section('navbar')
    @include('components.navbar_admin')
@endsection

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Laporan Riwayat Kuis Pengguna</h2>

        <div class="bg-white p-8 rounded-lg shadow-xl max-w-6xl mx-auto border-t-4 border-blue-500">
            @if ($attempts->isEmpty())
                <p class="text-center text-gray-600 text-lg">Belum ada pengguna yang menyelesaikan kuis.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal table-auto">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-200">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tl-lg">
                                    Pengguna
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Level Kuis
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Skor
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total Soal
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tr-lg">
                                    Tanggal Selesai
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attempts as $attempt)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-5 py-5 text-sm text-gray-900">
                                        {{ $attempt->user->nama_lengkap ?? 'User Tidak Ditemukan' }} {{-- Akses nama lengkap user --}}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900 capitalize">
                                        {{ $attempt->level }}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900 font-bold">
                                        {{ $attempt->score }}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900">
                                        {{ $attempt->total_questions }}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900">
                                        {{ $attempt->completed_at?->format('d M Y, H:i') ?? 'Belum Selesai' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $attempts->links() }} {{-- Menampilkan link paginasi --}}
                </div>
            @endif
        </div>
    </div>
@endsection
