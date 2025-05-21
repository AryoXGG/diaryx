@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/shownote.css') }}">

<div class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('notes.index') }}">Notes</a>
    <a href="{{ route('todos.index') }}">Todo</a>
    <a href="{{ route('user-challenges.index') }}">Challenge</a>
    
</div>
    <h1>Details Todo</h1>
    <div class="detail-container">
    <table>
        <tr>
            <th>Task</th>
            <td>{{ $todo->task }}</td>
        </tr>
        <tr>
            <th>Due Date</th>
            <td>{{ $todo->due_date }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $todo->status }}</td>
        </tr>
    </table>
    <a href="{{ route('todos.index') }}"class="back-link">Kembali</a>
    </div>
    
@endsection
