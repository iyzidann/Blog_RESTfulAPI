<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel
    // Endpoint: GET /articles
    public function index(Request $request)
    {
        return Article::with('category')->paginate($request->get('limit', 10));
    }

    // Menyimpan artikel baru
    // Endpoint: POST /articles
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
            'category_id' => 'exists:categories,id'
        ]);

        $article = Article::create($validated);
        return response()->json($article, 201);
    }

    // Menampilkan detail artikel berdasarkan ID
    // Endpoint: GET /articles/{id}
    public function show($id)
    {
        return Article::with('category')->findOrFail($id);
    }

    
    // Memperbarui artikel berdasarkan ID
    // Endpoint: PUT /articles/{id}
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->only('title', 'content', 'author', 'category_id'));
        return response()->json($article);
    }

    // Menghapus artikel berdasarkan ID
    // Endpoint: DELETE /articles/{id}
    public function destroy($id)
    {
        Article::destroy($id);
        return response()->json(['message' => 'Artikel berhasil dihapus']);
    }

    // Mencari artikel berdasarkan kategori_id dan/atau keyword di judul
    // Endpoint: GET /articles/search
    public function search(Request $request)
    {
        $query = Article::query();

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        return $query->with('category')->paginate(10);
    }
}
