@extends('layouts.admin_layout')

@section('title', 'Kelola Data Lahan Petani')

@section('content')
<div class="space-y-6">
    <div class="flex justify-end items-center">
        <div class="relative w-full md:w-80">
            <input type="text" 
                   placeholder="Cari nama pemilik lahan..." 
                   class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] focus:outline-none shadow-sm bg-white text-sm">
            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Nama Pemilik</th>
                        <th class="p-4 border-b">Lokasi/Blok Lahan</th>
                        <th class="p-4 border-b">Luas Lahan (m²)</th>
                        <th class="p-4 border-b">Jenis Tanah</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">1</td>
                        <td class="p-4 font-bold text-gray-800">Budi Santoso</td>
                        <td class="p-4 text-gray-600 uppercase">Blok A1</td>
                        <td class="p-4 font-medium text-gray-700">1000</td>
                        <td class="p-4 text-gray-600">Aluvial</td>
                        <td class="p-4 text-center">
                            <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded-lg shadow-sm flex items-center gap-2 mx-auto transition duration-300">
                                <i class="far fa-check-circle text-xs"></i> Verifikasi
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">2</td>
                        <td class="p-4 font-bold text-gray-800">Siti Aminah</td>
                        <td class="p-4 text-gray-600 uppercase">Blok B2</td>
                        <td class="p-4 font-medium text-gray-700">1500</td>
                        <td class="p-4 text-gray-600">Regosol</td>
                        <td class="p-4 text-center">
                            <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded-lg shadow-sm flex items-center gap-2 mx-auto transition">
                                <i class="far fa-check-circle text-xs"></i> Verifikasi
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">3</td>
                        <td class="p-4 font-bold text-gray-800">Joko Susilo</td>
                        <td class="p-4 text-gray-600 uppercase">Blok C3</td>
                        <td class="p-4 font-medium text-gray-700">800</td>
                        <td class="p-4 text-gray-600">Latosol</td>
                        <td class="p-4 text-center">
                            <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded-lg shadow-sm flex items-center gap-2 mx-auto transition">
                                <i class="far fa-check-circle text-xs"></i> Verifikasi
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection