<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Note;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalNotes = Note::count();
        $totalCourses = Course::count();
        $latestUsers = User::latest()->take(5)->get();
        $latestNotes = Note::latest()->take(5)->get();
        $latestCourses = Course::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalAdmins', 'totalNotes', 'totalCourses',
            'latestUsers', 'latestNotes', 'latestCourses'
        ));
    }
}