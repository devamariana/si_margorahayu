@extends('layouts.petani_layout')

@section('title', 'Profil & Lahan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 p-4 rounded shadow-sm">
        <p class="text-green-700 font-bold"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
    </div>
    @endif

    {{-- Alert Status Verifikasi Dinamis --}}
    @if(optional(Auth::user())->status == 'disetujui')
        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <i class="fas fa-check-double text-green-500 mr-3 text-xl"></i>
                <p class="text-sm text-green-700">
                    <strong>Selamat!</strong> Akun Anda telah <span class="font-bold uppercase">Terverifikasi</span>. Data lahan dan identitas Anda sudah disetujui oleh Ketua.
                </p>
            </div>
        </div>
    @else
        <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <i class="fas fa-clock text-orange-400 mr-3 text-xl"></i>
                <p class="text-sm text-orange-700">
                    <strong>Perhatian:</strong> Akun Anda sedang dalam status <span class="font-bold uppercase">Menunggu Verifikasi</span>. Pastikan data lahan dan berkas KTP/KK sudah benar agar segera disetujui oleh Ketua.
                </p>
            </div>
        </div>
    @endif

    {{-- Form Action diarahkan ke route petani.update --}}
    <form action="{{ route('petani.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="bg-white rounded-xl shadow-sm border border-green-100 overflow-hidden">
            <div class="bg-[#2D6A4F] px-6 py-3">
                <h3 class="text-white font-bold flex items-center">
                    <i class="fas fa-id-card mr-2"></i> Informasi Lahan & Identitas
                </h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">NIK (Sesuai KTP)</label>
                    <input type="text" name="nik" value="{{ optional(Auth::user())->nik }}" placeholder="Contoh: 3512XXXXXXXXXXXX" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ optional(Auth::user())->nama_lengkap }}" placeholder="Masukkan Nama Sesuai KTP" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nomor HP / WhatsApp (Terdaftar)</label>
                    <input type="text" name="no_hp" value="{{ optional(Auth::user())->no_hp }}" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-500 outline-none cursor-not-allowed" readonly>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Luas Lahan (m²)</label>
                    <div class="relative">
                        <input type="number" name="luas_lahan" value="{{ optional(Auth::user())->luas_lahan }}" placeholder="Contoh: 500" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] outline-none">
                        <span class="absolute right-4 top-3 text-gray-400 font-bold">m²</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-1 italic">*Luas lahan menentukan jatah kuota bibit subsidi Anda.</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" rows="2" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2D6A4F] outline-none">{{ optional(Auth::user())->alamat }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-green-100 overflow-hidden">
            <div class="bg-[#2D6A4F] px-6 py-3">
                <h3 class="text-white font-bold flex items-center">
                    <i class="fas fa-file-upload mr-2"></i> Berkas Pendukung (Foto KTP & KK)
                </h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-gray-700">Foto KTP Asli</label>
                    @if(optional(Auth::user())->foto_ktp)
                        <p class="text-xs text-green-600 mb-1"><i class="fas fa-check-circle"></i> File sudah terunggah</p>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-[#2D6A4F] transition group cursor-pointer">
                        <i class="fas fa-address-card text-4xl text-gray-300 group-hover:text-[#2D6A4F] mb-2"></i>
                        <input type="file" name="foto_ktp" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-[#2D6A4F] hover:file:bg-green-100">
                    </div>
                </div>
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-gray-700">Foto Kartu Keluarga (KK)</label>
                    @if(optional(Auth::user())->foto_kk)
                        <p class="text-xs text-green-600 mb-1"><i class="fas fa-check-circle"></i> File sudah terunggah</p>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-[#2D6A4F] transition group cursor-pointer">
                        <i class="fas fa-users text-4xl text-gray-300 group-hover:text-[#2D6A4F] mb-2"></i>
                        <input type="file" name="foto_kk" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-[#2D6A4F] hover:file:bg-green-100">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-[#2D6A4F] hover:bg-[#1B4332] text-white font-bold py-3 px-10 rounded-xl shadow-lg transform hover:-translate-y-1 transition duration-300 flex items-center">
                <i class="fas fa-save mr-2"></i> SIMPAN PERUBAHAN DATA
            </button>
        </div>
    </form>
</div>
@endsection