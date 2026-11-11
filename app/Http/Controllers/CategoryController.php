<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|unique:categories,nama_kategori',
        ]);

        Category::create($data);
        return back()->with('pesan', 'Kategori berhasil disimpan!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('pesan', 'Kategori berhasil dihapus!');
    }
}