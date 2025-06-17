@extends('layouts.admin')

@section('navbar')
    @include('components.navbar_admin')
@endsection

@section('content')
    <h2 class="text-2xl font-bold mb-6">Analytics</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white shadow p-6 rounded text-center">
            <div class="text-3xl font-bold">{{ $jumlahUser }}</div>
            <div class="text-gray-600 mt-2">Jumlah Pengguna Terdaftar</div>
        </div>
        <div class="bg-white shadow p-6 rounded text-center">
            <div class="text-3xl font-bold">{{ $jumlahPenggunaKuis }}</div>
            <div class="text-gray-600 mt-2">Jumlah Pengguna Mengikuti Kuis</div>
        </div>
    </div>

    <div class="bg-white shadow rounded p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Aktivitas Pengguna (7 Hari Terakhir)</h3>
            <span class="text-sm text-gray-500">Jumlah Pengguna & Quiz</span>
        </div>
        <div class="h-80 relative">
            <canvas id="userActivityChart"></canvas>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('userActivityChart').getContext('2d');

            const userActivityChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Pengguna Terdaftar',
                        data: @json($registeredUsersData),
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.1,
                        fill: true
                    }, {
                        label: 'Pengguna Ikut Kuis',
                        data: @json($quizUsersData),
                        borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Pengguna'
                            },
                            // --- TAMBAHKAN BAGIAN INI ---
                            ticks: {
                                precision: 0 // Pastikan nilai tick adalah bilangan bulat
                            }
                            // -----------------------------
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tanggal'
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        },
                        title: {
                            display: true,
                            text: 'Perbandingan Pengguna Terdaftar vs. Mengikuti Kuis'
                        }
                    }
                }
            });
        });
    </script>
@endpush
