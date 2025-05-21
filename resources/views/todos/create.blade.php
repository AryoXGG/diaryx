@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/createnote.css') }}">

<div class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('notes.index') }}">Notes</a>
    <a href="{{ route('todos.index') }}">Todo</a>
    <a href="{{ route('user-challenges.index') }}">Challenge</a>
    
</div>

    <h1>Buat Todo Baru</h1>

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
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <p>User: {{ Auth::user()->name }}</p>
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">

        <label for="task">Task:</label>
        <input type="text" name="task" id="task" value="{{ old('task') }}">

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}">

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Belum dimulai">Belum dimulai</option>
            <option value="Dalam Proses">Dalam Proses</option>
            <option value="Selesai">Selesai</option>
        </select>


        <button type="submit">Create</button>
    </form>
    </div>
@endsection
