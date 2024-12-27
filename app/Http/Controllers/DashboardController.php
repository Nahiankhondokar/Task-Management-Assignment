<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index (): View
    {
        $tasks = Task::orderByDesc('id')->get();
        return view('dashboard', 
            ['tasks' => $tasks]
        );
    }

    
}
