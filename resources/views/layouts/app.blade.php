<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" href="{{ asset('img/icon2.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Header -->
    
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Konten Utama -->
        <div class="flex-1 p-6">
            @yield('content') <!-- Halaman konten yang akan di-inject di sini -->
        </div>
    </div>

    <!-- Sambungkan File JavaScript -->
    <script src="{{ asset('js/app.js') }}" type="module"></script>

</body>
</html>
