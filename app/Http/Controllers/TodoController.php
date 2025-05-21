<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|integer',
            'task' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Belum dimulai,Dalam Proses,Selesai',
        ]);

        Todo::create($request->all());
        return redirect()->route('todos.index')->with('success', 'Todo berhasil dibuat.');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'user_id' => 'nullable|integer',
            'task' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Belum dimulai,Dalam Proses,Selesai',
        ]);

        $todo->update($request->all());
        return redirect()->route('todos.index')->with('success', 'Todo berhasil diupdate.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo berhasil dihapus.');
    }
}
