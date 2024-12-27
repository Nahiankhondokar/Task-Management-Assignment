<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index ()
    {
        $tasks = Task::orderByDesc('id')->get();
        return $this->sendResponse($tasks, 'Task list');
    }

    
}
