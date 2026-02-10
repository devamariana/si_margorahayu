@extends('layouts.admin_layout')

@section('title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
            <p class="text-gray-500 text-xs font-bold uppercase mb-2">Total Petani</p>
            <p class="text-3xl font-bold text-gray-800 tracking-tight">120</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
            <p class="text-gray-500 text-xs font-bold uppercase mb-2">Stok Bibit</p>
            <p class="text-3xl font-bold text-gray-800 tracking-tight">5000 kg</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
            <p class="text-gray-500 text-xs font-bold uppercase mb-2">Transaksi Berhasil</p>
            <p class="text-3xl font-bold text-gray-800 tracking-tight">85</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="text-sm font-bold text-gray-700 mb-4 uppercase tracking-wider">Distribusi Penjualan Bibit per Bulan</h3>
            <div class="h-64 relative border-2 border-gray-50 rounded-lg">
                <canvas id="adminSalesChart"></canvas>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="text-sm font-bold text-gray-700 mb-4 uppercase tracking-wider text-center">Persentase Status Pembayaran</h3>
            <div class="h-64 relative border-2 border-gray-50 rounded-lg flex justify-center">
                <canvas id="adminStatusChart"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 bg-gray-50 border-b border-gray-100">
            <h3 class="text-sm font-bold text-gray-700">5 Transaksi Terbaru</h3>
        </div>
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase font-bold">
                    <tr>
                        <th class="p-4 border-b">Tanggal</th>
                        <th class="p-4 border-b">Nama Petani</th>
                        <th class="p-4 border-b">Jenis Bibit</th>
                        <th class="p-4 border-b">Total Harga</th>
                        <th class="p-4 border-b">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">2025-01-15</td>
                        <td class="p-4 font-medium text-gray-800 uppercase">Budi Santoso</td>
                        <td class="p-4">Padi Unggul</td>
                        <td class="p-4 font-bold text-gray-800">Rp 500.000</td>
                        <td class="p-4 italic font-bold text-green-600">Lunas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Logika Chart tetap sama seperti kode Anda
        new Chart(document.getElementById('adminSalesChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
                datasets: [{
                    label: 'Penjualan (kg)',
                    data: [120, 190, 300, 500, 200],
                    borderColor: '#2D6A4F',
                    backgroundColor: 'rgba(45, 106, 79, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        new Chart(document.getElementById('adminStatusChart'), {
            type: 'pie',
            data: {
                labels: ['Lunas', 'Pending'],
                datasets: [{
                    data: [65, 35],
                    backgroundColor: ['#2D6A4F', '#F59E0B']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    });
</script>
@endsection