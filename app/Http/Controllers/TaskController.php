<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function show(): View
    {
        $tasks = Task::orderByDesc('id')->get();
        return view('dashboard', 
            ['tasks' => $tasks]
        );
    }
}
