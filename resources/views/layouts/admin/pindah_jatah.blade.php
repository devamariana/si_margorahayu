@extends('layouts.admin_layout')
@section('title', 'Fitur Pindah Jatah')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold mb-4">Input Pemindahan Jatah</h3>
        <form action="{{ route('admin.proses_pindah') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilih Petani Pengirim (Kurangi Jatah)</label>
                    <select name="pengirim_id" class="w-full border rounded-lg p-2" required>
                        <option value="">-- Pilih Pengirim --</option>
                        @foreach($petanis as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_lengkap }} (Sisa Jatah: {{ (($p->luas_lahan/100)*10) + ($p->jatah_tambahan ?? 0) }} kg)</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilih Petani Penerima (Tambah Jatah)</label>
                    <select name="penerima_id" class="w-full border rounded-lg p-2" required>
                        <option value="">-- Pilih Penerima --</option>
                        @foreach($petanis as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jumlah Jatah (Kg)</label>
                    <input type="number" name="jumlah_kg" class="w-full border rounded-lg p-2" placeholder="Misal: 5" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700">Pindahkan Sekarang</button>
            </div>
        </form>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold mb-4">Riwayat Pemindahan</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="p-2">Pengirim</th>
                        <th class="p-2">Penerima</th>
                        <th class="p-2">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayatPindah as $r)
                    <tr class="border-b">
                        <td class="p-2">{{ $r->pengirim->nama_lengkap }}</td>
                        <td class="p-2">{{ $r->penerima->nama_lengkap }}</td>
                        <td class="p-2 text-blue-600 font-bold">{{ $r->jumlah_kg }} Kg</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection