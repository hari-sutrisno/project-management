<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProjects' => Project::count(),
            'totalTasks' => Task::count(),
            'pendingTasks' => Task::where('status', 'Pending')->count(),
            'inProgressTasks' => Task::where('status', 'In Progress')->count(),
            'doneTasks' => Task::where('status', 'Done')->count(),
        ]);
    }
}
