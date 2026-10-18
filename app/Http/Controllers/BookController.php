<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'stock' => 'required|integer|min:0|max:1000',
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'title.unique' => 'Judul buku sudah terdaftar.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'year.required' => 'Tahun terbit wajib diisi.',
            'year.integer' => 'Tahun harus berupa bilangan bulat.',
            'year.min' => 'Tahun terbit minimal 1900.',
            'year.max' => 'Tahun tidak boleh melebihi tahun saat ini.',
            'stock.required' => 'Stock wajib diisi.',
            'stock.integer' => 'Stock tidak boleh negatif.',
            'stock.max' => 'Stock maksimal 1000,',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'stock' => 'required|integer|min:0|max:1000',
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'title.unique' => 'Judul buku sudah terdaftar.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'year.required' => 'Tahun terbit wajib diisi.',
            'year.integer' => 'Tahun harus berupa bilangan bulat.',
            'year.min' => 'Tahun terbit minimal 1900.',
            'year.max' => 'Tahun tidak boleh melebihi tahun sekarang.',
            'stock.required' => 'Stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'stock.min' => 'Stok tidak boleh negatif.',
            'stock.max' => 'Stok maksimal 10000.',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}