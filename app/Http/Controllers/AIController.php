<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class AIController extends Controller
{
    public function recommend(Request $request)
    {
        $goal = $request->input('goal');

        // Simple AI simulation: match goal with skill name
        $recommendations = Skill::where('name', 'LIKE', '%' . $goal . '%')->get();

        return view('dashboard', compact('recommendations'));
    }
}
