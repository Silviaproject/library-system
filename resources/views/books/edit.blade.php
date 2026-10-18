
@extends('layouts.app')

@section('content')
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Judul Buku:</label><br>
            <input type="text" name="title"
                   value="{{ old('title', $book->title) }}" required>
        </p>

        <p>
            <label>Penulis:</label><br>
            <input type="text" name="author"
                   value="{{ old('author', $book->author) }}" required>
        </p>

        <p>
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year"
                   value="{{ old('year', $book->year) }}"
                   min="1900" max="{{ date('Y') }}" required>
        </p>

        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock"
                   value="{{ old('stock', $book->stock) }}"
                   min="0" max="1000" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection