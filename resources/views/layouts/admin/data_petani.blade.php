@extends('layouts.admin_layout')

@section('title', 'Kelola Data Petani')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-96">
            <input type="text" 
                   placeholder="Cari nama petani..." 
                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] focus:outline-none shadow-sm">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        
        <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md flex items-center gap-2 transition duration-300">
            <i class="fas fa-plus text-sm"></i> Tambah Petani
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-600 uppercase text-[10px] font-bold tracking-wider">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Nama Petani</th>
                        <th class="p-4 border-b">NIK</th>
                        <th class="p-4 border-b">Alamat</th>
                        <th class="p-4 border-b">Luas Lahan</th>
                        <th class="p-4 border-b text-center">Berkas (KTP/KK)</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    {{-- LOOPING DATA PETANI DARI DATABASE --}}
                    @foreach($petanis as $index => $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-500">{{ $index + 1 }}</td>
                        <td class="p-4 font-bold text-gray-800">{{ $p->nama_lengkap ?? $p->username }}</td>
                        <td class="p-4 text-gray-600 font-mono text-xs">{{ $p->nik ?? '-' }}</td>
                        <td class="p-4 text-gray-600 text-xs">{{ $p->alamat ?? '-' }}</td>
                        <td class="p-4 font-bold text-[#2D6A4F]">{{ $p->luas_lahan ?? '0' }} m²</td>
                        <td class="p-4 text-center">
                            <div class="flex flex-col gap-1">
                                @if($p->foto_ktp)
                                <a href="{{ asset('uploads/identitas/' . $p->foto_ktp) }}" target="_blank" class="text-blue-600 hover:underline text-[10px] font-bold flex items-center justify-center gap-1">
                                    <i class="fas fa-id-card"></i> KTP
                                </a>
                                @endif
                                
                                @if($p->foto_kk)
                                <a href="{{ asset('uploads/identitas/' . $p->foto_kk) }}" target="_blank" class="text-blue-600 hover:underline text-[10px] font-bold flex items-center justify-center gap-1">
                                    <i class="fas fa-users"></i> KK
                                </a>
                                @endif

                                @if(!$p->foto_ktp && !$p->foto_kk)
                                <span class="text-gray-400 text-[10px]">Belum Upload</span>
                                @endif
                            </div>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button title="Verifikasi/ACC" class="w-8 h-8 bg-orange-500 hover:bg-orange-600 text-white rounded shadow-sm transition">
                                    <i class="fas fa-check text-xs"></i>
                                </button>
                                <button title="Hapus" class="w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded shadow-sm transition">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection