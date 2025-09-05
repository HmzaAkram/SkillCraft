<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = $user->courses;
        $progressData = [];

        foreach ($courses as $course) {
            $completed = $user->progress->where('course_id', $course->id)->where('status', 'completed')->count();
            $totalLessons = $course->lessons->count();
            $percentage = $totalLessons > 0 ? ($completed / $totalLessons * 100) : 0;
            $progressData[] = [
                'course' => $course,
                'percentage' => $percentage,
                'completed' => $completed,
                'pending' => $totalLessons - $completed,
            ];
        }

        return view('progress', compact('progressData'));
    }
}