@extends('layouts.petani_layout')

@section('title', 'Riwayat Pembelian')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Riwayat Pembelian</h2>
        
        <div class="relative">
            <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-[#2D6A4F] cursor-pointer shadow-sm">
                <option>Filter Periode Tanam</option>
                <option>Januari - Juni 2025</option>
                <option>Juli - Desember 2025</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-700">
                        <th class="p-4 text-sm font-bold border-b">Tanggal Transaksi</th>
                        <th class="p-4 text-sm font-bold border-b">Kode Transaksi</th>
                        <th class="p-4 text-sm font-bold border-b">Nama Bibit</th>
                        <th class="p-4 text-sm font-bold border-b">Jumlah Beli</th>
                        <th class="p-4 text-sm font-bold border-b">Total Harga</th>
                        <th class="p-4 text-sm font-bold border-b text-center">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-sm text-gray-600">2025-01-15</td>
                        <td class="p-4 text-sm font-mono text-gray-500">TRX001</td>
                        <td class="p-4 text-sm font-medium text-gray-800">Padi Unggul</td>
                        <td class="p-4 text-sm text-gray-600">100 kg</td>
                        <td class="p-4 text-sm font-bold text-gray-800">Rp 1.500.000</td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-md uppercase">Lunas</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-sm text-gray-600">2025-01-16</td>
                        <td class="p-4 text-sm font-mono text-gray-500">TRX002</td>
                        <td class="p-4 text-sm font-medium text-gray-800">Jagung Manis</td>
                        <td class="p-4 text-sm text-gray-600">50 kg</td>
                        <td class="p-4 text-sm font-bold text-gray-800">Rp 500.000</td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 bg-yellow-500 text-white text-[10px] font-bold rounded-md uppercase">Menunggu</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-sm text-gray-600">2025-01-17</td>
                        <td class="p-4 text-sm font-mono text-gray-500">TRX003</td>
                        <td class="p-4 text-sm font-medium text-gray-800">Kedelai Hitam</td>
                        <td class="p-4 text-sm text-gray-600">75 kg</td>
                        <td class="p-4 text-sm font-bold text-gray-800">Rp 750.000</td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-md uppercase">Lunas</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection