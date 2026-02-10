<div class="w-64 bg-[#2D6A4F] text-white flex-shrink-0 flex flex-col shadow-2xl h-screen">
    <div class="p-6 border-b border-[#40916C] bg-[#1B4332]">
        <div class="flex items-center gap-3">
            <i class="fas fa-user-shield text-[#D8F3DC] text-2xl"></i>
            <span class="text-sm font-bold tracking-widest uppercase">Admin Margo Rahayu</span>
        </div>
    </div>
    
    <nav class="mt-4 flex-1 px-4 space-y-2 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('admin.dashboard') ? 'bg-[#40916C] shadow-inner font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-chart-line mr-3 group-hover:scale-110 transition"></i> Dashboard
        </a>

        <a href="{{ route('admin.data_petani') }}" 
            class="flex items-center py-3 px-4 rounded-xl transition {{ request()->routeIs('admin.data_petani') ? 'bg-[#40916C] font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-users mr-3"></i> Data Petani
        </a>

        <a href="{{ route('admin.data_bibit') }}" 
            class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('admin.data_bibit') ? 'bg-[#40916C] font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-seedling mr-3 group-hover:scale-110 transition"></i> Data Bibit
        </a>

        <a href="{{ route('admin.data_periode') }}" 
            class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('admin.data_periode') ? 'bg-[#40916C] font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-calendar-alt mr-3 group-hover:scale-110 transition"></i> Data Periode
        </a>

        <a href="{{ route('admin.data_lahan') }}" 
            class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('admin.data_lahan') ? 'bg-[#40916C] font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-map-marked-alt mr-3 group-hover:scale-110 transition text-sm"></i> Data Lahan
        </a>

        <a href="{{ route('admin.riwayat_transaksi') }}" 
            class="flex items-center py-3 px-4 rounded-xl transition group {{ request()->routeIs('admin.riwayat_transaksi') ? 'bg-[#40916C] font-bold border-l-4 border-[#D8F3DC]' : 'text-green-100 hover:bg-[#40916C]' }}">
            <i class="fas fa-list-ul mr-3"></i> Riwayat Transaksi
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
