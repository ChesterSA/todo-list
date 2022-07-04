@extends('layout')

@section('title', 'Index')

@section('content')
    <h1 class="text-3xl w-full text-center px-auto">Tasks</h1>
    <a class="text-1xl w-full text-center px-auto text-blue-600" href="{{route('tasks.create')}}">Create New Task</a>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
                            <th scope="col" colspan="2" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Task
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Due Date
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr @if($task->isLate()) class="bg-red-500" @endif>
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {!! $task->icon !!}
                                </td>
                                <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                    {{ $task->name }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                    {{ $task->due_date_formatted }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                    <a href="{{route('tasks.edit', $task)}}">Edit</a>
{{--                                    <form action="{{route('tasks.complete', $task)}}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="submit" value="Complete Task">--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection

