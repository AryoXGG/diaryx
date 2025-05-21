@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/createnote.css') }}">

    <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
    </div>

    <h1>Buat Note</h1>

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
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <p>User: {{ Auth::user()->name }}</p>
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
            
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            
            <label for="content">Content:</label>
            <textarea id="content" name="content">{{ old('content') }}</textarea>
            
            <label for="mood">Mood:</label>
            <select id="mood" name="mood">
                <option value="senang">Senang</option>
                <option value="sedih">Sedih</option>
                <option value="marah">Marah</option>
                <option value="kecewa">Kecewa</option>
            </select>
            
            <button type="submit">Buat</button>
        </form>
    </div>
@endsection
