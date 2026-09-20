<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = 8;
        $totalMembers = 5;
        $totalCategories = 5;

        return view('dashboard.index', compact(
            'totalBooks',
            'totalMembers',
            'totalCategories'
        ));
    }
}