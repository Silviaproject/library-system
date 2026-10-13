
@extends('layouts.app')

@section('content')
    <h1>Detail Buku</h1>

    <p><strong>ID:</strong> {{ $book->id }}</p>
    <p><strong>Judul:</strong> {{ $book->title }}</p>
    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->year }}</p>
    <p><strong>Stok:</strong> {{ $book->stock }}</p>

    <a href="{{ route('books.edit', $book) }}">Edit Buku</a>
    
    <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
@endsection