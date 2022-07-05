<h3 class="text-xl mb-4">Create New Task</h3>
<form class="w-full max-w-sm" action="{{route('tasks.store')}}" method="POST">
    @csrf
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                Task Name
            </label>
        </div>
        <div class="md:w-2/3">
            <input
                class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                id="create_name" type="text" placeholder="Finish Project" name="name" required>
        </div>
    </div>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                Due Date
            </label>
        </div>
        <div class="md:w-2/3">
            <input
                class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                id="create_due_date" type="datetime-local" name="due_at" required>
        </div>
    </div>
    <div class="md:flex md:items-center">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
            <input
                class="shadow bg-blue-600 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit" value="Create" onclick="closeCreateModal()">
        </div>
    </div>
</form>
