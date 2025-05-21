@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/indexnote.css') }}">

    <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
    </div>

    <h1>Notes</h1>

    <center>
        <div class="create-note">
            <a href="{{ route('notes.create') }}">Buat Note</a>
        </div>
    </center>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Title</th>
                <th>Content</th>
                <th>Mood</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->note_id }}</td>
                    <td>{{ $note->user->name }}</td> 
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->content }}</td>
                    <td>{{ $note->mood }}</td>
                    <td>
                        <a href="{{ route('notes.show', $note->note_id) }}">Show</a>
                        <a href="{{ route('notes.edit', $note->note_id) }}">Edit</a>
                        <form action="{{ route('notes.destroy', $note->note_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
