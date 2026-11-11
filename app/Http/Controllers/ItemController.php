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
