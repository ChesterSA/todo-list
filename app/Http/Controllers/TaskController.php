<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'is_complete' => false,
            'due_date' => null
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
