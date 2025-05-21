@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/shownote.css') }}">

    <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
        
    </div>

    <h1>Detail Note</h1>

    <div class="detail-container">
        <p>ID: {{ $note->note_id }}</p>
        <p>User ID: {{ $note->user_id }}</p>
        <p>Title: {{ $note->title }}</p>
        <p>Content: {{ $note->content }}</p>
        <p>Mood: {{ $note->mood }}</p>
        <p>Created At: {{ $note->created_at }}</p>
        <p>Updated At: {{ $note->updated_at }}</p>

        <a href="{{ route('notes.index') }}" class="back-link">Kembali</a>
    </div>
@endsection
