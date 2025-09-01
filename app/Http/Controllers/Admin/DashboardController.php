<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalAdmins' => User::where('role','admin')->count(),
            'totalNotes' => Note::count(),
            'latestUsers' => User::latest()->take(5)->get(),
            'latestNotes' => Note::latest()->take(5)->get(),
        ]);
    }
}
