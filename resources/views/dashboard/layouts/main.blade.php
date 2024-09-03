<!DOCTYPE html >
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <title>Halaman Home</title>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
</head>
<body class="h-full">
    <div class="min-h-full">
        @include('dashboard.layouts.header')
        <div class="flex">
        {{-- Sidebar --}}
            @include('dashboard.layouts.sidebar')
            {{-- Main Content --}}
            <main class="flex-grow border bg-white border-gray-200 shadow-inner">
                @yield('container')
            </main>
        </div>
    </div>
</body>
</html>
