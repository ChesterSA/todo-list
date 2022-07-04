@extends('layout')

@section('title', 'create')

@section('content')
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <label>
            Name:
            <input type="text" name="name" placeholder="Finish Project">
        </label>
        <input type="submit">
    </form>
@endsection
