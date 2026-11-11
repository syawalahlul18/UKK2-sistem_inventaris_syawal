@extends('layouts.app')

@section('content')
    <h2 class="font-bold mb-4">Data Kategori Barang</h2>

    @if(session('pesan'))
        <div class="bg-green-100 p-2 mb-2">{{ session('pesan') }}</div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" class="border p-4 mb-4">
        @csrf
        <div class="mb-2">
            <label>Nama Kategori:</label>
            <input type="text" name="nama_kategori" required class="border p-1 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2">Simpan</button>
    </form>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Kategori</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            @forelse($categories as $index => $c)
                <tr>
                    <td class="border p-2 text-center">{{ $index + 1 }}</td>
                    <td class="border p-2">{{ $c->nama_kategori }}</td>
                    <td class="border p-2 text-center">
                        <form action="{{ route('categories.destroy', $c->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border p-2 text-center">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection