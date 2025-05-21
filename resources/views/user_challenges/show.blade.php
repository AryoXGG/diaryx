@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/shownote.css') }}">

    <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
        
    </div>

    <h1>User Challenge Details</h1>
    <div class="detail-container">
    <p>User: {{ $userChallenge->user->name }}</p>
    <p>Challenge: {{ $userChallenge->challenge->title }}</p>
    <p>Description: {{ $userChallenge->challenge->description }}</p>
    <p>Start Date: {{ $userChallenge->challenge->start_date }}</p>
    <p>End Date: {{ $userChallenge->challenge->end_date }}</p>
    <p>Status: {{ $userChallenge->challenge->status }}</p>
    <a href="{{ route('user-challenges.index') }}" class="back-link">Kembali</a>
    </div>
@endsection
