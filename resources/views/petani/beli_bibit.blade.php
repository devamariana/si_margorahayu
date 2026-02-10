@extends('layouts.petani_layout')

@section('title', 'Informasi & Pembelian Bibit')

@section('content')
<div class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
            <div class="w-full h-32 border-2 border-gray-200 rounded-lg flex items-center justify-center mb-4 relative">
                <svg class="absolute inset-0 w-full h-full text-gray-200" preserveAspectRatio="none">
                    <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="2" />
                    <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="2" />
                </svg>
            </div>
            <h4 class="font-bold text-gray-800">Padi Unggul</h4>
            <p class="text-xs text-gray-500 mb-2">Varietas Ciherang</p>
            <p class="text-[#2D6A4F] font-bold mb-3">Rp 15.000/kg</p>
            <span class="inline-block px-4 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full border border-green-200">Tersedia</span>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
            <div class="w-full h-32 border-2 border-gray-200 rounded-lg flex items-center justify-center mb-4 relative">
                <svg class="absolute inset-0 w-full h-full text-gray-200" preserveAspectRatio="none">
                    <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="2" />
                    <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="2" />
                </svg>
            </div>
            <h4 class="font-bold text-gray-800">Jagung Manis</h4>
            <p class="text-xs text-gray-500 mb-2">Varietas Bonanza</p>
            <p class="text-[#2D6A4F] font-bold mb-3">Rp 10.000/kg</p>
            <span class="inline-block px-4 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full border border-green-200">Tersedia</span>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center border-l-4 border-l-[#2D6A4F]">
            <div class="w-full h-32 border-2 border-gray-200 rounded-lg flex items-center justify-center mb-4 relative">
                <svg class="absolute inset-0 w-full h-full text-gray-200" preserveAspectRatio="none">
                    <line x1="0" y1="0" x2="100%" y2="100%" stroke="currentColor" stroke-width="2" />
                    <line x1="100%" y1="0" x2="0" y2="100%" stroke="currentColor" stroke-width="2" />
                </svg>
            </div>
            <h4 class="font-bold text-gray-800">Kedelai Hitam</h4>
            <p class="text-xs text-gray-500 mb-2">Varietas Detam 1</p>
            <p class="text-[#2D6A4F] font-bold mb-3">Rp 20.000/kg</p>
            <span class="inline-block px-4 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full border border-green-200">Tersedia</span>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <h3 class="text-xl font-bold text-gray-800 mb-6 uppercase tracking-wider">Ringkasan Pesanan</h3>
        
        <div class="space-y-4">
            <div class="flex justify-between text-gray-600 border-b pb-4">
                <span>Bibit Padi Unggul (100 Kg)</span>
                <span class="font-bold text-gray-800">Rp 1.500.000</span>
            </div>
            
            <div class="flex justify-between items-center py-2">
                <span class="text-lg font-bold text-gray-800">Total Pembayaran</span>
                <span class="text-2xl font-bold text-[#2D6A4F]">Rp 1.500.000</span>
            </div>

            <div class="mt-8">
                <p class="font-bold text-gray-700 mb-4">Metode Pembayaran</p>
                <div class="space-y-3">
                    <label class="flex items-center justify-between p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="payment" class="w-4 h-4 text-[#2D6A4F]">
                            <span class="text-sm font-medium">Virtual Account (VA)</span>
                        </div>
                        <i class="fas fa-university text-gray-400"></i>
                    </label>
                    <label class="flex items-center justify-between p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="payment" class="w-4 h-4 text-[#2D6A4F]">
                            <span class="text-sm font-medium">QRIS</span>
                        </div>
                        <i class="fas fa-qrcode text-gray-400"></i>
                    </label>
                </div>
            </div>

            <p class="text-center text-[10px] text-gray-400 mt-6 italic">Pembayaran diproses otomatis oleh Midtrans</p>

            <div class="flex justify-end mt-6">
                <button class="bg-[#007BFF] hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                    Konfirmasi & Bayar Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
@endsection