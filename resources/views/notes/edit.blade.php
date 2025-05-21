@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/editnote.css') }}">

    <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
    </div>

    <h1>Edit Note</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('notes.update', $note->note_id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" value="{{ $note->user_id }}">
            
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}">
            
            <label for="content">Content:</label>
            <textarea id="content" name="content">{{ $note->content }}</textarea>
            
            <label for="mood">Mood:</label>
            <select id="mood" name="mood">
                <option value="senang" @if($note->mood == 'senang') selected @endif>Senang</option>
                <option value="sedih" @if($note->mood == 'sedih') selected @endif>Sedih</option>
                <option value="marah" @if($note->mood == 'marah') selected @endif>Marah</option>
                <option value="kecewa" @if($note->mood == 'kecewa') selected @endif>Kecewa</option>
            </select>
            
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
