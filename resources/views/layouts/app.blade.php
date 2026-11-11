<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-4 text-gray-800">

    <nav class="bg-white border p-3 mb-4 flex justify-between items-center rounded shadow-sm">
        <span class="font-bold tracking-wide">INVENTARIS</span>
        <div class="space-x-4 text-sm font-medium">
            <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline">Data Barang</a>
            <a href="#" class="text-gray-500 hover:underline">Kategori Barang</a>
            <a href="#" class="text-gray-500 hover:underline">Lokasi</a>
        </div>
    </nav>

    <div class="bg-white border p-4 rounded shadow-sm">
        @yield('content')
    </div>

</body>
</html>

