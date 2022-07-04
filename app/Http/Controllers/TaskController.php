<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $tasks = Task::where('name', 'LIKE', "%$search%")->orderBy('due_date')->get();

        $incomplete_tasks = $tasks->filter(function($task) {
            return $task->is_complete == 0;
        });
        $complete_tasks = $tasks->filter(function($task) {
            return $task->is_complete == 1;
        });


        return view('tasks.index', compact('complete_tasks', 'incomplete_tasks', 'search'));
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'is_complete' => false,
            'due_date' => $request->due_date
        ]);

        return redirect(route('tasks.index'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->name = $request->name;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect(route('tasks.index'));
    }

    public function complete(Task $task)
    {
        $task->is_complete = true;
        $task->save();

        return redirect(route('tasks.index'));
    }

}
