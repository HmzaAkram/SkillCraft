<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses->count();
        $totalProgress = $user->progress->count() > 0 ? ($user->progress->where('status', 'completed')->count() / $user->progress->count() * 100) : 0;
        $certifications = $user->certifications->count();
        $notes = $user->notes ? $user->notes->count() : 0; // Assuming notes relation
        $continueLearning = Progress::where('user_id', $user->id)->where('status', 'started')->latest()->first();

        return view('dashboard', compact('enrolledCourses', 'totalProgress', 'certifications', 'notes', 'continueLearning'));
    }
}