@extends('layouts.admin_layout')

@section('title', 'Kelola Data Petani')

@section('content')
<div class="space-y-6">
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 p-4 rounded shadow-sm">
        <p class="text-green-700 font-bold"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
    </div>
    @endif

    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-96">
            <input type="text" 
                   placeholder="Cari nama petani..." 
                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] focus:outline-none shadow-sm">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-600 uppercase text-[10px] font-bold tracking-wider">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Username</th>
                        <th class="p-4 border-b">Nama Lengkap</th>
                        <th class="p-4 border-b">NIK</th>
                        <th class="p-4 border-b">Luas Lahan</th>
                        <th class="p-4 border-b">Status</th>
                        <th class="p-4 border-b text-center">Identitas</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach($petanis as $index => $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-500">{{ $index + 1 }}</td>
                        
                        {{-- PERBAIKAN: Ambil Username dari relasi user --}}
                        <td class="p-4 font-mono text-blue-600">
                            {{ $p->user->username ?? 'User Terhapus' }}
                        </td>

                        <td class="p-4 font-bold text-gray-800 uppercase">
                            {{ $p->nama_lengkap ?? '-' }}
                        </td>
                        
                        <td class="p-4 text-gray-600 font-mono">{{ $p->nik ?? '-' }}</td>
                        
                        <td class="p-4 font-bold text-[#2D6A4F]">{{ $p->luas_lahan ?? '0' }} m²</td>
                        
                        <td class="p-4">
                            @if($p->status == 'disetujui')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-[10px] font-bold">TERVERIFIKASI</span>
                            @else
                                <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded-full text-[10px] font-bold">PENDING</span>
                            @endif
                        </td>
                        
                        {{-- KOLOM FOTO --}}
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-1">
                                @if($p->foto_ktp)
                                    <a href="{{ asset('uploads/identitas/' . $p->foto_ktp) }}" target="_blank" title="Lihat KTP" class="p-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        <i class="fas fa-id-card"></i>
                                    </a>
                                @endif
                                @if($p->foto_kk)
                                    <a href="{{ asset('uploads/identitas/' . $p->foto_kk) }}" target="_blank" title="Lihat KK" class="p-1 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                        <i class="fas fa-users"></i>
                                    </a>
                                @endif
                            </div>
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                {{-- Tombol ACC --}}
                                @if($p->status != 'disetujui')
                                <form action="{{ route('admin.verifikasi_petani', $p->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="disetujui">
                                    <button type="submit" title="Setujui Petani" class="w-8 h-8 bg-orange-500 hover:bg-orange-600 text-white rounded shadow-sm flex items-center justify-center transition">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                </form>
                                @else
                                <button disabled class="w-8 h-8 bg-gray-300 text-white rounded cursor-not-allowed flex items-center justify-center">
                                    <i class="fas fa-check-double text-xs"></i>
                                </button>
                                @endif

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.hapus_petani', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus petani ini? Akun login juga akan terhapus.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" class="w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded shadow-sm flex items-center justify-center transition">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </form>
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