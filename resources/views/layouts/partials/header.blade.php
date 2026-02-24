<header class="bg-white shadow-sm py-4 px-8 flex justify-between items-center border-b border-green-100">
    <div class="flex items-center">
        <h1 class="text-xl font-bold text-[#1B4332] uppercase tracking-wide">
            @yield('title')
        </h1>
    </div>
    
    <div class="flex items-center gap-4">
        <div class="text-right hidden sm:block">
            <p class="text-sm font-bold text-[#2D6A4F]">{{ Auth::user()->name }}</p>
            
            {{-- LOGIKA STATUS VERIFIKASI - DISINKRONKAN KE KATA 'disetujui' --}}
            @if(Auth::user()->status == 'disetujui')
                <p class="text-xs text-green-600 font-bold italic">
                    <i class="fas fa-check-circle mr-1"></i>Status: Terverifikasi
                </p>
            @else
                <p class="text-xs text-orange-600 font-semibold italic">
                    <i class="fas fa-clock mr-1"></i>Status: Menunggu Verifikasi
                </p>
            @endif
        </div>
        <div class="w-10 h-10 rounded-full bg-[#2D6A4F] flex items-center justify-center text-white shadow-lg border-2 border-[#D8F3DC]">
            <i class="fas fa-user"></i>
        </div>
    </div>
</header>