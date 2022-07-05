<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $tasks = Task::where('name', 'LIKE', "%$search%")->orderBy('due_at')->get();

        $incomplete_tasks = $tasks->filter(function($task) {
            return $task->completed_at === null;
        });
        $complete_tasks = $tasks->filter(function($task) {
            return $task->completed_at !== null;
        });

        return view('tasks.index', compact('complete_tasks', 'incomplete_tasks', 'search'));
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'completed_at' => null,
            'due_at' => $request->due_at
        ]);

        return redirect(route('tasks.index'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->name = $request->name;
        $task->due_at = $request->due_at;
        $task->save();

        return redirect(route('tasks.index'));
    }

    public function complete(Task $task)
    {
        $task->completed_at = Carbon::now();
        $task->save();

        return redirect(route('tasks.index'));
    }

}
