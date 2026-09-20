<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index(){
        $books = [
            [
                'title' => 'Pemrograman PHP',
                'author' => 'Budi Raharjo',
                'year'=> '2022',    
            ],
            [
                'title' => 'Laravel untuk Pemula',
                'author' => 'Andi Pratama',
                'year' => 2023,
            ],
            [
                'title' => 'Basis Data',
                'author' => 'Rosa A.S.',
                'year' => 2021,
            ],
            [
                'title' => 'Algoritma dan Pemrograman',
                'author' => 'Abdul Kadir',
                'year' => 2022,
            ],
            [
                'title' => 'Pemrograman Web',
                'author' => 'Jubilee Enterprise',
                'year' => 2024,
            ],
        ];       
        $categories = [
            'Pemrograman',
            'Basis Data',
            'Jaringan Komputer',
            'Sistem Informasi',
            'Algoritma',
        ];
        $stock = 7;
        $title = 'Daftar Buku';
        $description = 'Koleksi buku pada Sistem Informasi Perpustakaan.';
        return view('books.index',compact('books','categories','stock', 'title', 'description'));
    }

    public function show($id)
    {
    return view('books.show', compact('id'));
    }     
}
