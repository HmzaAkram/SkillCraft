<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // ✅ Show all notes (students + admin dono ke liye)
    public function index()
    {
        $notes = Note::latest()->get();
        return view('notes.index', compact('notes'));
    }

    // ✅ Sirf admin ko note create page dikhana
    public function create()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return view('notes.create');
    }

    // ✅ Sirf admin hi note save kar sake
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        Note::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note added successfully.');
    }

    // ✅ Student aur admin dono download kar saken
    public function download(Note $note)
    {
        $filename = $note->title . '.txt';
        return response($note->content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
    }
}
