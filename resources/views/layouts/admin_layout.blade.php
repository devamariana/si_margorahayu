<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Margo Rahayu II</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#F0F7F2] font-sans antialiased text-gray-800">
    <div class="flex h-screen overflow-hidden">
        
        @include('layouts.partials.sidebar_admin')

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-sm py-4 px-8 flex justify-between items-center border-b border-green-100">
                <h1 class="text-xl font-bold text-[#1B4332] uppercase tracking-wider">@yield('title')</h1>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-xs font-bold text-gray-500 uppercase italic leading-none">Ketua Kelompok</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-[#2D6A4F] flex items-center justify-center text-white shadow-md">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 bg-[#F8FBF9]">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>