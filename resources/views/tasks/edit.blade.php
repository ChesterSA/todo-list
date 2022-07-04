@extends('layout')

@section('title', 'create')

@section('content')
    <form action="{{route('tasks.update', $task->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label>
            Name:
            <input type="text" name="name" value="{{ $task->name }}">
        </label>
        <label>
            Due Date:
            <input type="datetime-local" name="due_date" value="{{ $task->due_date }}">
        </label>
        <input type="submit">
    </form>
@endsection
