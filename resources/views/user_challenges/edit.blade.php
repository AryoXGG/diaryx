@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/editnote.css') }}">

<div class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('notes.index') }}">Notes</a>
    <a href="{{ route('todos.index') }}">Todo</a>
    <a href="{{ route('user-challenges.index') }}">Challenge</a>
</div>

    <h1>Edit User Challenge</h1>
    <div class="form-container">
    <form action="{{ route('user-challenges.update', $userChallenge->user_challenge_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Challenge:</label>
            <input type="text" value="{{ $userChallenge->challenge->title }}" disabled>
        </div>
        <div>
            <label>Start Date:</label>
            <input type="date" name="start_date" value="{{ $userChallenge->challenge->start_date }}" required>
        </div>
        <div>
            <label>End Date:</label>
            <input type="date" name="end_date" value="{{ $userChallenge->challenge->end_date }}" required>
        </div>
        <div>
            <label>Status:</label>
            <input type="text" name="status" value="{{ $userChallenge->challenge->status }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
    </div>
@endsection
