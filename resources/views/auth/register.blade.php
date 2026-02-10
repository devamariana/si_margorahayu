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
<body class="bg-[#F0F7F2] flex items-center justify-center min-h-screen p-4 md:p-10">

    <div class="w-full max-w-lg bg-white rounded-[3rem] shadow-[0_25px_60px_rgba(45,106,79,0.15)] overflow-hidden border border-gray-50">
        
        <div class="h-3 bg-[#2D6A4F]"></div>

        <div class="p-8 md:p-14">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-[#D8F3DC] rounded-[2rem] mb-6 shadow-sm">
                    <i class="fas fa-user-plus text-[#2D6A4F] text-4xl"></i>
                </div>
                
                <h2 class="text-3xl font-extrabold text-[#1B4332] tracking-tight uppercase">Daftar Akun</h2>
                <p class="text-gray-400 mt-2 font-medium italic">Sistem Informasi Petani Margo Rahayu II</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-xl">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label for="no_hp" class="block text-sm font-semibold text-gray-700 ml-1">No. Handphone</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <input id="no_hp" name="no_hp" type="text" value="{{ old('no_hp') }}" placeholder="08xxxx" required 
                            class="block w-full pl-12 pr-6 py-4 bg-gray-50 border @error('no_hp') border-red-500 @else border-transparent @enderror rounded-2xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="username" class="block text-sm font-semibold text-gray-700 ml-1">Username</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Masukkan username" required 
                            class="block w-full pl-12 pr-6 py-4 bg-gray-50 border @error('username') border-red-500 @else border-transparent @enderror rounded-2xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-gray-700 ml-1">Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" placeholder="********" required 
                            class="block w-full pl-12 pr-6 py-4 bg-gray-50 border @error('password') border-red-500 @else border-transparent @enderror rounded-2xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 ml-1">Konfirmasi Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-[#2D6A4F] transition-colors">
                            <i class="fas fa-check-double text-sm"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="********" required 
                            class="block w-full pl-12 pr-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-2 focus:ring-[#2D6A4F] outline-none transition duration-200">
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" 
                        class="w-full py-5 bg-[#2D6A4F] hover:bg-[#1B4332] text-white font-bold rounded-2xl shadow-[0_12px_24px_rgba(45,106,79,0.3)] hover:shadow-none transform hover:translate-y-1 transition duration-300 uppercase tracking-[0.2em] text-sm">
                        Daftar Akun
                    </button>
                </div>
            </form>

            <div class="mt-12 text-center border-t border-gray-50 pt-8">
                <p class="text-sm text-gray-500 font-medium">
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