@extends('layouts.admin_layout')

@section('title', 'Kelola Data Bibit Tanaman')

@section('content')
<div class="space-y-6">
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 p-4 rounded shadow-sm">
        <p class="text-green-700 font-bold"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
    </div>
    @endif

    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-80">
            <input type="text" 
                   placeholder="Cari nama bibit..." 
                   class="w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] focus:outline-none shadow-sm bg-white">
        </div>
        
        {{-- Tombol Tambah Bibit --}}
        <button onclick="openModal()" class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md flex items-center gap-2 transition duration-300">
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
                    @forelse($bibits as $index => $b)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">{{ $index + 1 }}</td>
                        {{-- Ganti bagian kolom Foto Bibit di dalam loop @forelse dengan ini --}}
                        <td class="p-4">
                            <div class="w-16 h-16 border-2 border-gray-300 rounded flex items-center justify-center relative bg-gray-50 overflow-hidden">
                                @if($b->gambar)
                                    {{-- Tambahkan / sebelum uploads agar path menjadi absolut --}}
                                    <img src="{{ asset('/uploads/bibit/' . $b->gambar) }}" alt="Foto Bibit" class="w-full h-full object-cover">
                                @else
                                    <svg class="absolute inset-0 w-full h-full text-gray-300" preserveAspectRatio="none">
                                        <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="1" />
                                        <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="1" />
                                    </svg>
                                @endif
                            </div>
                        </td>
                        <td class="p-4 font-bold text-gray-800 uppercase">{{ $b->nama_bibit }}</td>
                        <td class="p-4 text-gray-600 font-medium">{{ $b->jenis ?? '-' }}</td>
                        <td class="p-4 text-gray-600">{{ $b->stok }}</td>
                        <td class="p-4 font-bold text-gray-800">Rp {{ number_format($b->harga_subsidi, 0, ',', '.') }}</td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <button title="Edit" class="w-8 h-8 bg-[#FFC107] hover:bg-yellow-500 text-white rounded shadow-sm flex items-center justify-center transition">
                                    <i class="fas fa-edit text-[10px]"></i>
                                </button>
                                <form action="{{ route('admin.data_bibit.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" class="w-8 h-8 bg-[#DC3545] hover:bg-red-600 text-white rounded shadow-sm flex items-center justify-center transition">
                                        <i class="fas fa-trash-alt text-[10px]"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500 italic">Data bibit belum tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL TAMBAH DATA --}}
<div id="modalBibit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Tambah Bibit Baru</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <form action="{{ route('admin.store_bibit') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold mb-1">Nama Bibit</label>
                <input type="text" name="nama_bibit" class="w-full border rounded-lg p-2 text-xs focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>
            <div>
                <label class="block text-xs font-bold mb-1">Jenis/Varietas</label>
                <input type="text" name="jenis" class="w-full border rounded-lg p-2 text-xs focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold mb-1">Stok (Kg)</label>
                    <input type="number" name="stok" class="w-full border rounded-lg p-2 text-xs focus:ring-2 focus:ring-green-500 outline-none" required>
                </div>
                <div>
                    <label class="block text-xs font-bold mb-1">Harga per Kg</label>
                    <input type="number" name="harga_subsidi" class="w-full border rounded-lg p-2 text-xs focus:ring-2 focus:ring-green-500 outline-none" required>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold mb-1">Foto Bibit</label>
                <input type="file" name="gambar" class="w-full text-xs text-gray-500">
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-xs font-bold text-gray-500">Batal</button>
                <button type="submit" class="px-6 py-2 bg-[#007BFF] text-white rounded-lg text-xs font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modalBibit').classList.remove('hidden');
        document.getElementById('modalBibit').classList.add('flex');
    }
    function closeModal() {
        document.getElementById('modalBibit').classList.add('hidden');
        document.getElementById('modalBibit').classList.remove('flex');
    }
</script>
@endsection