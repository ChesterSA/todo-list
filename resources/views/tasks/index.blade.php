<!-- Stored in resources/views/child.blade.php -->

@extends('layout')

@section('title', 'index')

@section('content')
    @foreach($tasks as $task)
        <p>
            {{ $task->is_complete ? 'yes' : 'no' }} {{ $task->name }} <a href="{{route('tasks.edit', $task)}}">Edit</a>
        </p>
    @endforeach

    <a href="{{route('tasks.create')}}">Create New Task</a>
@endsection

