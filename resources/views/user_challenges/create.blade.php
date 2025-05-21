@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/createnote.css') }}">

    <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
        
    </div>

    <h1> User Challenge</h1>
    <div class="form-container">
    <form action="{{ route('user-challenges.store') }}" method="POST">
        @csrf
        <div>
            <label>User:</label>
            <input type="text" value="{{ $currentUser->name }}" disabled>
            <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
        </div>
        <div>
            <label>Challenge:</label>
            <select name="challenge_id" required>
                @foreach ($challenges as $challenge)
                    <option value="{{ $challenge->challenge_id }}">{{ $challenge->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Simpan</button>
    </form>
    </div>
@endsection
