@extends('layout')

@section('title', 'Index')

@section('content')
    <h1 class="text-3xl w-full text-center px-auto">To Do List</h1>

    <button class="text-1xl w-full text-center px-auto text-blue-600" onclick="openCreateModal()">
        Create New Task
    </button>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="create-modal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('forms.create')
        </div>
    </div>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="edit-modal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('forms.edit')
        </div>
    </div>

    <div class="flex items-center justify-center mt-5">
        <div class="border-2 rounded">
            <form method="GET" action="{{ route('tasks.index') }}" class="flex mb-0">
                <input type="text" name="search" class="px-4 py-2 w-80" placeholder="Search by Name..."
                       value="{{ $search }}">
                <button class="flex items-center justify-center px-4 border-l" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
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
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Completed
                            </th>
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
                        <tr>
                            <td colspan="5"><hr></td>
                        </tr>
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
        function openCreateModal() {
            let modal = document.getElementById("create-modal");
            modal.style.display = "block";
        }

        function closeCreateModal() {
            let modal = document.getElementById("create-modal");

            let name = document.getElementById("create_name");
            let date = document.getElementById("create_due_date");

            if (name.checkValidity() && date.checkValidity()) {
                modal.style.display = "none";
            }
        }

        function openEditModal(task) {
            let name_input = document.getElementById("edit_name");
            name_input.value = task.name
            let date_input = document.getElementById("edit_due_date");
            date_input.value = task.due_at

            let form = document.getElementById('edit_form');
            form.action = '/tasks/' + task.id;

            let edit_modal = document.getElementById("edit-modal");
            edit_modal.style.display = "block";
        }

        function closeEditModal() {
            let modal = document.getElementById("edit-modal");

            let name = document.getElementById("edit_name");
            let date = document.getElementById("edit_due_date");

            if (name.checkValidity() && date.checkValidity()) {
                modal.style.display = "none";
            }
        }

        window.onclick = function (event) {
            let create_modal = document.getElementById("create-modal");
            let edit_modal = document.getElementById("edit-modal");

            if (event.target === create_modal) {
                create_modal.style.display = "none";
            }
            if (event.target === edit_modal) {
                edit_modal.style.display = "none";
            }
        }
    </script>
@endsection

