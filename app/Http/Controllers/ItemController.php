<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::latest();

        if ($request->cari) {
            $query->where('nama_barang', 'like', "%{$request->cari}%")
                  ->orWhere('kode_barang', 'like', "%{$request->cari}%");
        }

        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        $items = $query->get();
        $categories = class_exists(\App\Models\Category::class) ? \App\Models\Category::all() : [];

        return view('items.index', compact('items', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang',
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'lokasi'      => 'required',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required',
        ]);

        Item::create($data);
        return back()->with('pesan', 'Barang berhasil disimpan!');
    }

    public function edit(Item $item)
    {
        $categories = class_exists(\App\Models\Category::class) ? \App\Models\Category::all() : [];
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,' . $item->id,
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'lokasi'      => 'required',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required',
        ]);

        $item->update($data);
        return redirect()->route('items.index')->with('pesan', 'Barang berhasil diperbarui!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('pesan', 'Barang berhasil dihapus!');
    }
}