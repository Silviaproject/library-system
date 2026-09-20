@extends('layouts.app')
@section('title', 'Data Kategori')
@section('content')
<h2>Data Kategori</h2>
<ul>
    @foreach($categories as $category)
        <li>{{ $category }}</li>
    @endforeach
</ul>

@endsection