@extends('layouts.admin_layout')

@section('title', 'Monitor Riwayat Transaksi')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-2 text-green-600 font-medium text-sm">
            <i class="fas fa-check-circle"></i>
            <span>Status Integrasi Midtrans: Connected</span>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-[#2D6A4F] cursor-pointer">
                <option>Filter Periode</option>
            </select>
            <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-[#2D6A4F] cursor-pointer">
                <option>Filter Status Pembayaran</option>
            </select>
            <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-lg shadow-md flex items-center gap-2 transition duration-300 text-xs">
                <i class="fas fa-print"></i> Cetak Laporan
            </button>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="p-4 border-b">Tanggal</th>
                        <th class="p-4 border-b">Nama Petani</th>
                        <th class="p-4 border-b">Bibit Dibeli</th>
                        <th class="p-4 border-b">Total Harga</th>
                        <th class="p-4 border-b">Status (Midtrans)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">2023-01-15</td>
                        <td class="p-4 font-bold text-gray-800 uppercase">Budi Santoso</td>
                        <td class="p-4 text-gray-600">Padi Unggul (100kg)</td>
                        <td class="p-4 font-bold text-gray-800 tracking-tight">Rp 1.000.000</td>
                        <td class="p-4 text-gray-700 font-medium">Completed</td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">2023-01-16</td>
                        <td class="p-4 font-bold text-gray-800 uppercase">Siti Aminah</td>
                        <td class="p-4 text-gray-600">Jagung Manis (50kg)</td>
                        <td class="p-4 font-bold text-gray-800 tracking-tight">Rp 350.000</td>
                        <td class="p-4 text-gray-700 font-medium">Pending</td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">2023-01-17</td>
                        <td class="p-4 font-bold text-gray-800 uppercase">Joko Susilo</td>
                        <td class="p-4 text-gray-600">Kedelai Hitam (75kg)</td>
                        <td class="p-4 font-bold text-gray-800 tracking-tight">Rp 700.000</td>
                        <td class="p-4 text-gray-700 font-medium">Cancelled</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection