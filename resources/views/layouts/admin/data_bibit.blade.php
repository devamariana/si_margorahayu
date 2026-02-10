@extends('layouts.admin_layout')

@section('title', 'Kelola Data Bibit Tanaman')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-80">
            <input type="text" 
                   placeholder="Cari nama bibit..." 
                   class="w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] focus:outline-none shadow-sm bg-white">
        </div>
        
        <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md flex items-center gap-2 transition duration-300">
            <i class="fas fa-plus text-sm"></i> Tambah Bibit
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 font-bold">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Foto Bibit</th>
                        <th class="p-4 border-b">Nama Bibit</th>
                        <th class="p-4 border-b">Jenis/Varietas</th>
                        <th class="p-4 border-b">Stok (Kg)</th>
                        <th class="p-4 border-b">Harga per Kg</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">1</td>
                        <td class="p-4">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded flex items-center justify-center relative bg-gray-50 overflow-hidden">
                                <svg class="absolute inset-0 w-full h-full text-gray-300" preserveAspectRatio="none">
                                    <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="1" />
                                    <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="1" />
                                </svg>
                            </div>
                        </td>
                        <td class="p-4 font-bold text-gray-800 uppercase">Padi Unggul</td>
                        <td class="p-4 text-gray-600 font-medium">Ciherang</td>
                        <td class="p-4 text-gray-600">1000</td>
                        <td class="p-4 font-bold text-gray-800">Rp 15.000</td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <button class="w-8 h-8 bg-[#FFC107] hover:bg-yellow-500 text-white rounded shadow-sm flex items-center justify-center transition">
                                    <i class="fas fa-edit text-[10px]"></i>
                                </button>
                                <button class="w-8 h-8 bg-[#DC3545] hover:bg-red-600 text-white rounded shadow-sm flex items-center justify-center transition">
                                    <i class="fas fa-trash-alt text-[10px]"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">2</td>
                        <td class="p-4">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded flex items-center justify-center relative bg-gray-50">
                                <svg class="absolute inset-0 w-full h-full text-gray-300" preserveAspectRatio="none">
                                    <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="1" />
                                    <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="1" />
                                </svg>
                            </div>
                        </td>
                        <td class="p-4 font-bold text-gray-800 uppercase">Jagung Manis</td>
                        <td class="p-4 text-gray-600 font-medium">Bonanza</td>
                        <td class="p-4 text-gray-600">500</td>
                        <td class="p-4 font-bold text-gray-800">Rp 10.000</td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button class="w-8 h-8 bg-[#FFC107] text-white rounded shadow-sm flex items-center justify-center"><i class="fas fa-edit text-[10px]"></i></button>
                                <button class="w-8 h-8 bg-[#DC3545] text-white rounded shadow-sm flex items-center justify-center"><i class="fas fa-trash-alt text-[10px]"></i></button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">3</td>
                        <td class="p-4">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded flex items-center justify-center relative bg-gray-50">
                                <svg class="absolute inset-0 w-full h-full text-gray-300" preserveAspectRatio="none">
                                    <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="1" />
                                    <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="1" />
                                </svg>
                            </div>
                        </td>
                        <td class="p-4 font-bold text-gray-800 uppercase">Kedelai Hitam</td>
                        <td class="p-4 text-gray-600 font-medium">Detam 1</td>
                        <td class="p-4 text-gray-600">750</td>
                        <td class="p-4 font-bold text-gray-800">Rp 20.000</td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button class="w-8 h-8 bg-[#FFC107] text-white rounded shadow-sm flex items-center justify-center"><i class="fas fa-edit text-[10px]"></i></button>
                                <button class="w-8 h-8 bg-[#DC3545] text-white rounded shadow-sm flex items-center justify-center"><i class="fas fa-trash-alt text-[10px]"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection