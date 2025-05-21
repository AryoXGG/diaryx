@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/editnote.css') }}">

      <div class="navbar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('notes.index') }}">Notes</a>
        <a href="{{ route('todos.index') }}">Todo</a>
        <a href="{{ route('user-challenges.index') }}">Challenge</a>
        
    </div>
    <h1>Edit Todo</h1>

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
    <form action="{{ route('todos.update', $todo->todo_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="task">Task:</label>
        <input type="text" name="task" id="task" value="{{ $todo->task }}">

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="{{ $todo->due_date }}">

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Belum dimulai" {{ $todo->status == 'Belum dimulai' ? 'selected' : '' }}>Belum dimulai</option>
            <option value="Dalam Proses" {{ $todo->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
            <option value="Selesai" {{ $todo->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        </select>


        <button type="submit">Update</button>
    </form>
    </div>
@endsection
