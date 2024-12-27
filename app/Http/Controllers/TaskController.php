<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::orderByDesc('id')->get();
        return view('dashboard', 
            ['tasks' => $tasks]
        );
    }

    public function create(): View
    {
        return view('task.create');
    }

    public function store(TaskCreateRequest $request): RedirectResponse
    {
        $task = Task::query()->create([
            'task'          => $request->task,
            'desc'          => $request->desc,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
        ]);
        
        if($task){
            return redirect()
            ->route('dashboard')
            ->with('success', 'Task created successful');
        }
        return redirect()
        ->back()
        ->with('error', 'Task failed');
    }

    public function show(Task $task): View
    {
        return view('task.view', 
            ['task' => $task]
        );
    }

    public function edit(Task $task): View
    {
        return view('task.edit', 
            ['task' => $task]
        );
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        if(!$task){
            return redirect()
            ->back()
            ->with('error', 'Task not found!');
        }
        
        $task->task     = $request->task;
        $task->desc     = $request->desc;
        $task->status   = $request->status;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->save();
        
        return redirect()
        ->route('task.index')
        ->with('success', 'Task updated successfully');
    
    }
}
