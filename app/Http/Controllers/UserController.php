<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;

class UserController extends Controller
{
    public function trackProgress()
    {
        $progress = UserProgress::where('user_id', auth()->id())
                    ->with('skill')
                    ->get();

        return view('dashboard', compact('progress'));
    }
}
