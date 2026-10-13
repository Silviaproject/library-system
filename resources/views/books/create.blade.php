
@extends('layouts.app')

@section('content')
    <h1>Tambah Buku</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <p>
            <label>Judul Buku:</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </p>

        <p>
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ old('author') }}" required>
        </p>

        <p>
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" value="{{ old('year') }}"
                   min="1000" max="{{ date('Y') }}" required>
        </p>

        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}"
                   min="0" required>
        </p>

        <button type="submit">Simpan Buku</button>
        <a href="{{ route('books.index') }}">Kembali</a>
    </form>
@endsection