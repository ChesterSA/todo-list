<!-- Stored in resources/views/child.blade.php -->

@extends('layout')

@section('title', 'index')

@section('content')
    @foreach($tasks as $task)
        <div>
            {{ $task->is_complete ? 'yes' : 'no' }}
            {{ $task->name }}
            <a href="{{route('tasks.edit', $task)}}">Edit</a>
            <form action="{{route('tasks.complete', $task)}}" method="POST">
                @csrf
                <input type="submit">
            </form>
        </div>
    @endforeach

    <a href="{{route('tasks.create')}}">Create New Task</a>
@endsection

