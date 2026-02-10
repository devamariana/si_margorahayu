<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SI Petani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#F0F7F2] font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            
            @include('layouts.partials.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
                @yield('content')
            </main>

        </div>
    </div>
</body>
</html>