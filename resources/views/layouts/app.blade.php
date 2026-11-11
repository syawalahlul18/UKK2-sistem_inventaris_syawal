<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-gray-100 p-4 text-gray-800">

    <nav class="bg-white border p-3 mb-4 flex justify-between items-center rounded shadow-sm">
        <span class="font-bold tracking-wide">INVENTARIS</span>
        <div class="space-x-4 text-sm font-medium">
            <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline">Data Barang</a>
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">Kategori Barang</a>
      
        </div>
    </nav>

    <div class="bg-white border p-4 rounded shadow-sm">
        @yield('content')
    </div>

</body>
</html>

