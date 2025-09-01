<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;

class RoadmapController extends Controller
{
    public function show($id)
    {
        $roadmap = Roadmap::where('skill_id', $id)->first();

        if (!$roadmap) {
            return redirect()->back()->with('error', 'Roadmap not found for this skill.');
        }

        return view('roadmap', compact('roadmap'));
    }
}
