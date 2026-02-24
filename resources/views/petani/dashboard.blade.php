@extends('layouts.petani_layout')

@section('title', 'Dashboard Petani')

@section('content')
<div class="space-y-6">

    {{-- FITUR NOTIFIKASI OTOMATIS DARI DATABASE --}}
    @if(isset($bibitTerbaru))
    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg shadow-md animate-bounce">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-bullhorn text-blue-500 text-xl mr-3"></i>
                <p class="text-sm text-blue-800 font-bold">
                    INFO STOK: Bibit <span class="text-blue-600 underline">{{ $bibitTerbaru->nama_bibit }}</span> baru saja ditambahkan! Segera cek sebelum kehabisan.
                </p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-blue-500 hover:text-blue-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- BAGIAN STATUS AKUN - DISINKRONKAN KE KATA 'disetujui' --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
            <p class="text-gray-500 text-sm mb-2">Status Akun</p>
            @if(Auth::user()->status == 'disetujui')
                <p class="text-2xl font-bold text-green-600">Terverifikasi</p>
            @else
                <p class="text-2xl font-bold text-orange-600">Menunggu Verifikasi</p>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
            <p class="text-gray-500 text-sm mb-2">Total Belanja Bibit</p>
            <p class="text-2xl font-bold text-gray-800">Rp 2.500.000</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
            <p class="text-gray-500 text-sm mb-2">Tagihan Aktif</p>
            <p class="text-2xl font-bold text-orange-600">Rp 750.000</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-700 mb-4">Statistik Pembelian Bibit Saya</h3>
        <div style="height: 300px; position: relative;">
            <canvas id="pembelianChart"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-700">3 Transaksi Terakhir</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-sm">
                    <tr>
                        <th class="p-4 border-b">Tanggal</th>
                        <th class="p-4 border-b">Nama Bibit</th>
                        <th class="p-4 border-b">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b">
                        <td class="p-4">2025-01-15</td>
                        <td class="p-4 font-medium">Padi Unggul</td>
                        <td class="p-4 text-green-600 font-bold">Lunas</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">2025-01-16</td>
                        <td class="p-4 font-medium">Jagung Manis</td>
                        <td class="p-4 text-orange-500 font-bold">Menunggu</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">2025-01-17</td>
                        <td class="p-4 font-medium">Kedelai Hitam</td>
                        <td class="p-4 text-green-600 font-bold">Lunas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('pembelianChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'], 
                datasets: [{
                    label: 'Jumlah Pembelian (kg)',
                    data: [25, 45, 30, 60, 40, 75], 
                    borderColor: '#2D6A4F', 
                    backgroundColor: 'rgba(45, 106, 79, 0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#1B4332'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>
@endsection