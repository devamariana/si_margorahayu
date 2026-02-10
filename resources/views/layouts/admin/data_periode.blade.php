@extends('layouts.admin_layout')

@section('title', 'Kelola Periode Tanam')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-80">
            <input type="text" 
                   placeholder="Cari tahun periode..." 
                   class="w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] focus:outline-none shadow-sm bg-white">
        </div>
        
        <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md flex items-center gap-2 transition duration-300">
            <i class="fas fa-plus text-sm"></i> Tambah Periode
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 font-bold uppercase tracking-wider">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Tahun</th>
                        <th class="p-4 border-b">Tanggal Mulai</th>
                        <th class="p-4 border-b">Tanggal Selesai</th>
                        <th class="p-4 border-b">Status</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600 font-medium">1</td>
                        <td class="p-4 font-bold text-gray-800">2024</td>
                        <td class="p-4 text-gray-600">01 Januari 2024</td>
                        <td class="p-4 text-gray-600">31 Maret 2024</td>
                        <td class="p-4">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold text-[10px]">AKTIF</span>
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <button title="Edit" class="w-8 h-8 bg-[#FFC107] hover:bg-yellow-500 text-white rounded shadow-sm flex items-center justify-center transition">
                                    <i class="fas fa-edit text-[10px]"></i>
                                </button>
                                <button title="Hapus" class="w-8 h-8 bg-[#DC3545] hover:bg-red-600 text-white rounded shadow-sm flex items-center justify-center transition">
                                    <i class="fas fa-trash-alt text-[10px]"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600 font-medium">2</td>
                        <td class="p-4 font-bold text-gray-800">2023</td>
                        <td class="p-4 text-gray-600">01 Oktober 2023</td>
                        <td class="p-4 text-gray-600">31 Desember 2023</td>
                        <td class="p-4">
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full font-bold text-[10px]">BERAKHIR</span>
                        </td>
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