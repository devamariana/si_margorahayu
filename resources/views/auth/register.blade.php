<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Petani - Margo Rahayu II</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F0F7F2] flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-[450px] bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(45,106,79,0.1)] overflow-hidden border border-gray-50">
        
        <div class="h-2 bg-[#2D6A4F]"></div>

        <div class="p-10">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#D8F3DC] rounded-2xl mb-4 shadow-sm">
                    <i class="fas fa-user-plus text-[#2D6A4F] text-2xl"></i>
                </div>
                
                <h2 class="text-2xl font-extrabold text-[#1B4332] tracking-tight uppercase">Daftar Akun</h2>
                <p class="text-gray-400 text-sm mt-1 font-medium italic">Sistem Informasi Petani Margo Rahayu II</p>
            </div>

            {{-- PESAN ERROR UMUM --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-xl">
                    <p class="text-xs font-bold text-red-600 mb-1">Terjadi Kesalahan:</p>
                    <ul class="list-disc list-inside text-[10px] text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                
                {{-- EMAIL --}}
                <div class="space-y-1">
                    <label for="email" class="block text-xs font-bold text-gray-700 ml-1 uppercase tracking-wider">Alamat Email</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="contoh@email.com" required 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('email') border-red-500 @else border-transparent @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200 text-sm">
                    </div>
                    @error('email') <p class="text-[10px] text-red-500 ml-1">{{ $message }}</p> @enderror
                </div>

                {{-- USERNAME --}}
                <div class="space-y-1">
                    <label for="username" class="block text-xs font-bold text-gray-700 ml-1 uppercase tracking-wider">Username</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Masukkan username" required 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('username') border-red-500 @else border-transparent @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200 text-sm">
                    </div>
                    @error('username') <p class="text-[10px] text-red-500 ml-1">{{ $message }}</p> @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="space-y-1">
                    <label for="password" class="block text-xs font-bold text-gray-700 ml-1 uppercase tracking-wider">Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input id="password" name="password" type="password" placeholder="********" required 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('password') border-red-500 @else border-transparent @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200 text-sm">
                    </div>
                </div>

                {{-- KONFIRMASI --}}
                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-xs font-bold text-gray-700 ml-1 uppercase tracking-wider">Konfirmasi Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-check-double text-sm"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="********" required 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200 text-sm">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full py-4 bg-[#2D6A4F] hover:bg-[#1B4332] text-white font-bold rounded-xl shadow-lg hover:shadow-none transform hover:translate-y-0.5 transition duration-300 uppercase tracking-widest text-xs">
                        Daftar Akun
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-gray-50 pt-6">
                <p class="text-xs text-gray-500 font-medium">
                    Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="ml-1 font-bold text-[#2D6A4F] hover:text-[#40916C] underline-offset-4 hover:underline transition">
                        Masuk Sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>