@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/indexnote.css') }}">

<div class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('notes.index') }}">Notes</a>
    <a href="{{ route('todos.index') }}">Todo</a>
    <a href="{{ route('user-challenges.index') }}">Challenge</a>
</div>
<center>
<div >
    <h1>User Challenges</h1>
    <div class="create-note">
    <a href="{{ route('user-challenges.create') }}">Buat Challenge Baru</a>
    </div>
    <ul>
        @foreach ($userChallenges as $userChallenge)
            <li>
                {{ $userChallenge->user->name }} memilih challenge: {{ $userChallenge->challenge->title }}
                <a href="{{ route('user-challenges.show', $userChallenge->user_challenge_id) }}">View</a>
                <a href="{{ route('user-challenges.edit', $userChallenge->user_challenge_id) }}">Edit</a>
                <form action="{{ route('user-challenges.destroy', $userChallenge->user_challenge_id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
   </div>
   </center> 
@endsection

