<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByDesc('id')->get();
        return $this->sendResponse($tasks, 'Task list');
    }

    public function store(TaskCreateRequest $request)
    {
        $task = Task::query()->create([
            'task'          => $request->task,
            'desc'          => $request->desc,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
        ]);
        
        if($task){
            return $this->sendResponse($task, 'Task stored');
        }
        return $this->sendError('', 'Task failed');
    }

    public function show(Task $task)
    {
        return $this->sendResponse($task, 'Task show');
    }

    public function edit(Task $task)
    {
        return $this->sendResponse($task, 'Task edit');
    }

    public function update(Request $request, Task $task)
    {
        if(!$task){
            return $this->sendError('', 'Task not found');
        }
        
        $task->task     = $request->task;
        $task->desc     = $request->desc;
        $task->status   = $request->status;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->save();
        
        return $this->sendResponse($task, 'Task updated');
    }

    public function destroy(Task $task)
    {
        if(!$task){
            return $this->sendError('', 'Task not found');
        }
        $task->delete();

        return $this->sendResponse($task, 'Task deleted');
    }

    public function filterByStatus(string $status)
    {
        $tasks = Task::query()->where('status', $status)
        ->orderByDesc('id')
        ->get();

        return $this->sendResponse($tasks, 'Task filter result');
    }

    public function sortByEndDate(string $dateStatus)
    {
        $tasks = Task::query()
        ->orderByDesc("$dateStatus")
        ->get();

        return $this->sendResponse($tasks, 'Task sorted result');
    }
}
