<div class="w-64 bg-[#2D6A4F] text-white flex-shrink-0 flex flex-col shadow-2xl h-screen">
    <div class="p-6 border-b border-[#40916C] bg-[#1B4332]">
        <div class="flex items-center gap-3">
            <i class="fas fa-leaf text-[#D8F3DC] text-2xl"></i>
            <span class="text-lg font-bold tracking-widest uppercase">Margo Rahayu II</span>
        </div>
    </div>
    
    <nav class="mt-6 flex-1 px-4 space-y-2">
        <a href="{{ route('petani.dashboard') }}" 
           class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('petani.dashboard') ? 'bg-[#40916C] shadow-inner font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-th-large mr-3 group-hover:scale-110 transition"></i> Dashboard
        </a>

        <a href="{{ route('petani.profil') }}" 
           class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('petani.profil') ? 'bg-[#40916C] shadow-inner font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-user-circle mr-3 group-hover:scale-110 transition"></i> Profil & Lahan
        </a>

        <a href="{{ route('petani.beli_bibit') }}" 
           class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('petani.beli_bibit') ? 'bg-[#40916C] shadow-inner font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-seedling mr-3 group-hover:scale-110 transition"></i> Informasi & Beli Bibit
        </a>

        <a href="{{ route('petani.riwayat') }}" 
           class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('petani.riwayat') ? 'bg-[#40916C] shadow-inner font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-history mr-3 group-hover:scale-110 transition"></i> Riwayat Pembelian
        </a>
    </nav>

    <div class="p-4 border-t border-[#40916C]">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center py-3 px-4 rounded-xl text-white bg-red-600 hover:bg-red-700 transition duration-300 shadow-md">
                <i class="fas fa-power-off mr-3 text-sm"></i> 
                <span class="font-bold uppercase tracking-wider text-xs">Logout</span>
            </button>
        </form>
    </div>
</div>