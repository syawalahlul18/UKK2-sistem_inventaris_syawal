@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="font-bold text-lg">Edit Barang</h2>
        <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline">&larr; Kembali</a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 p-2 mb-2">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST" class="border p-4 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label>Kode Barang:</label>
            <input type="text" name="kode_barang" value="{{ old('kode_barang', $item->kode_barang) }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Kategori:</label>
            <select name="kategori" required class="border p-1 w-full">
                @forelse($categories as $cat)
                    <option value="{{ $cat->nama_kategori }}" {{ old('kategori', $item->kategori) == $cat->nama_kategori ? 'selected' : '' }}>
                        {{ $cat->nama_kategori }}
                    </option>
                @empty
                    <option value="{{ $item->kategori }}" selected>{{ $item->kategori }}</option>
                    @if($item->kategori !== 'Umum')
                        <option value="Umum">Umum</option>
                    @endif
                @endforelse
            </select>
        </div>
        <div class="mb-2">
            <label>Lokasi:</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $item->lokasi) }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Stok:</label>
            <input type="number" name="stok" min="0" value="{{ old('stok', $item->stok) }}" required class="border p-1 w-full">
        </div>
        <div class="mb-2">
            <label>Kondisi:</label>
            <select name="kondisi" class="border p-1 w-full">
                <option value="Baik" {{ old('kondisi', $item->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ old('kondisi', $item->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ old('kondisi', $item->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2">Perbarui Barang</button>
    </form>
@endsection

