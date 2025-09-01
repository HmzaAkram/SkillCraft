<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Show all notes
    public function index()
    {
        $notes = Note::latest()->get();
        return view('notes.index', compact('notes'));
    }

    // Admin form
    public function create()
    {
        return view('notes.create');
    }

    // Store uploaded note
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')->with('success','Note added successfully.');
    }
}   