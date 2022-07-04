@extends('layout')

@section('title', 'create')

@section('content')
    <form action="{{route('tasks.update', $task)}}" method="POST">
        @csrf
        @method('PUT')
        <label>
            Name:
            <input type="text" name="name" value="{{ $task->name }}">
        </label>
        <input type="submit">
    </form>
@endsection
