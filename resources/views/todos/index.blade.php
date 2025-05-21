@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/indexnote.css') }}">

<div class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('notes.index') }}">Notes</a>
    <a href="{{ route('todos.index') }}">Todo</a>
    <a href="{{ route('user-challenges.index') }}">Challenge</a>
</div>

<h1>Todo List</h1>

<center>
    <div class="create-note">
        <a href="{{ route('todos.create') }}">Buat Todo Baru</a>
    </div>
</center>

@if ($message = Session::get('success'))
    <div class="success-message">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->task }}</td>
                    <td>{{ $todo->due_date }}</td>
                    <td>{{ $todo->status }}</td>
                    <td>{{ $todo->user->name }}</td> 
                    <td>
                        <a href="{{ route('todos.show', $todo->todo_id) }}">Show</a>
                        <a href="{{ route('todos.edit', $todo->todo_id) }}">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->todo_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
