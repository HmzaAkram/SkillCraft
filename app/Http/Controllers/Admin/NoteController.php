<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(10);
        return view('admin.notes.index', compact('notes'));
    }

    public function create()
    {
        return view('admin.notes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'file'    => 'nullable|file|max:20480', // 20MB
        ]);

        $note = new Note();
        $note->title = $data['title'];
        $note->content = $data['content'];

        if ($request->hasFile('file')) {
            $note->file_path = $request->file('file')->store('notes', 'public');
        }

        $note->save();

        return redirect()->route('admin.notes.index')->with('success','Note created.');
    }

    public function edit(Note $note)
    {
        return view('admin.notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'file'    => 'nullable|file|max:20480',
        ]);

        $note->title = $data['title'];
        $note->content = $data['content'];

        if ($request->hasFile('file')) {
            if ($note->file_path) {
                Storage::disk('public')->delete($note->file_path);
            }
            $note->file_path = $request->file('file')->store('notes', 'public');
        }

        $note->save();

        return redirect()->route('admin.notes.index')->with('success','Note updated.');
    }

    public function destroy(Note $note)
    {
        if ($note->file_path) {
            Storage::disk('public')->delete($note->file_path);
        }
        $note->delete();

        return back()->with('success','Note deleted.');
    }

}
