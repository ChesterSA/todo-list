@extends('layout')

@section('title', 'Index')

@section('content')
    <h1 class="text-3xl w-full text-center px-auto">Tasks</h1>

    <button class="text-1xl w-full text-center px-auto text-blue-600" id="create">Create New Task</button>

    <div class="fixed hidden inset-0 bg-white-600 bg-opacity-50 overflow-y-auto h-full w-full" id="create-modal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('forms.create')
        </div>
    </div>

    <div class="flex items-center justify-center mt-5">
        <div class="border-2 rounded pb-1">
            <form method="GET" action="{{ route('tasks.index') }}" class="flex pb-0">
{{--                @csrf--}}
                <input type="text" name="search" class="px-4 py-2 w-80" placeholder="Search by Name..." value="{{ $search }}">
                <button class="flex items-center justify-center px-4 border-l" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>

        </div>
    </div>

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
                        @foreach($incomplete_tasks as $task)
                            @include('partials.row', ['task' => $task])
                        @endforeach

                        @foreach($complete_tasks as $task)
                            @include('partials.row', ['task' => $task])
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        let create_modal = document.getElementById("create-modal");
        let create_btn = document.getElementById("create");
        let store_btn = document.getElementById("store");

        create_btn.onclick = function () {
            create_modal.style.display = "block";
        }
        store_btn.onclick = function () {
            let name = document.getElementById("create_name");
            let date = document.getElementById("create_due_date");

            if(name.checkValidity() && date.checkValidity()){
                create_modal.style.display = "none";
            }
        }
        window.onclick = function (event) {
            if (event.target == create_modal) {
                create_modal.style.display = "none";
            }
        }
    </script>
@endsection

