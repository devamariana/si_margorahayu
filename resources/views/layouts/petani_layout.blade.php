<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SI Petani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Animasi halus untuk transisi halaman */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="bg-[#F0F7F2] font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        {{-- Sidebar di samping kiri --}}
        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            
            {{-- Header (Di sinilah letak status verifikasi di pojok kanan) --}}
            @include('layouts.partials.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8 fade-in">
                {{-- Konten dari dashboard atau profil akan muncul di sini --}}
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Script tambahan jika diperlukan --}}
    @stack('scripts')
</body>
</html>