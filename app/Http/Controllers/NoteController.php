<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'mood' => 'required|in:senang,sedih,marah,kecewa',
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')
                         ->with('success', 'Note berhasil dibuat .');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'mood' => 'required|in:senang,sedih,marah,kecewa',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')
                         ->with('success', 'Note berhasil diupdate.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
                         ->with('success', 'Note berhasil dihapus.');
    }
}
