<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    // Endpoint: GET /categories
    public function index()
    {
        return Category::all();
    }

    // Menambahkan kategori baru
    // Endpoint: POST /categories
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    // Menampilkan detail kategori berdasarkan ID
    // Endpoint: GET /categories/{id}
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    // Memperbarui kategori berdasarkan ID
    // Endpoint: PUT /categories/{id}
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only('name'));
        return response()->json($category);
    }

    // Menghapus kategori berdasarkan ID
    // Endpoint: DELETE /categories/{id}
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
