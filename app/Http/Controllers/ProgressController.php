<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // User ke saare progress records fetch karo
        $progress = Progress::with('skill') // agar relation hai
            ->where('user_id', $user->id)
            ->get();

        return view('progress', compact('progress'));
    }
}
