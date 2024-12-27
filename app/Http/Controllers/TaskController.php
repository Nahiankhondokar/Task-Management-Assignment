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
        return view('task.create');
    }

    public function show(): View
    {
        $tasks = Task::orderByDesc('id')->get();
        return view('dashboard', 
            ['tasks' => $tasks]
        );
    }

    public function create(TaskCreateRequest $request): RedirectResponse
    {
        $task = Task::query()->create([
            'task'          => $request->task,
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
}
