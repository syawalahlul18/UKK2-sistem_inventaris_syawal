@extends('layouts.app')

@section('content')
    <h2 class="font-bold mb-4">Daftar Barang</h2>

    @if(session('pesan'))
        <div class="bg-green-100 p-2 mb-2">{{ session('pesan') }}</div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 p-2 mb-2">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" class="border p-4 mb-4">
        @csrf
        <div class="mb-2">
            <label>Kode Barang:</label>
            <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Kategori:</label>
            <select name="kategori" required class="border p-1 w-full">
                @forelse($categories as $cat)
                    <option value="{{ $cat->nama_kategori }}">{{ $cat->nama_kategori }}</option>
                @empty
                    <option value="Umum">Umum</option>
                @endforelse
            </select>
        </div>
        <div class="mb-2">
            <label>Lokasi:</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Stok:</label>
            <input type="number" name="stok" min="0" value="{{ old('stok', 0) }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Kondisi:</label>
            <select name="kondisi" class="border p-1 w-full">
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2">Simpan Barang</button>
    </form>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Kode</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Lokasi</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Kondisi</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $b)
                <tr>
                    <td class="border p-2">{{ $b->kode_barang }}</td>
                    <td class="border p-2">{{ $b->nama_barang }}</td>
                    <td class="border p-2">{{ $b->kategori }}</td>
                    <td class="border p-2">{{ $b->lokasi }}</td>
                    <td class="border p-2">{{ $b->stok }}</td>
                    <td class="border p-2">{{ $b->kondisi }}</td>
                    <td class="border p-2">
                        <a href="{{ route('items.edit', $b->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('items.destroy', $b->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="border p-2 text-center">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
