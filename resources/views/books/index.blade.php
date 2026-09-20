@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
<h2>Daftar Buku</h2>
<ul>
    @foreach($books as $book)
        <li>
         <strong>{{ $book['title'] }}</strong>
         - {{ $book ['author'] }}
         ({{ $book['year'] }})
        </li>
    @endforeach
</ul>

@if($stock > 0)
    <p>Stok tersedia: {{ $stock }}</p>
@else
    <p>Buku sedang habis.</p>
@endif

@endsection