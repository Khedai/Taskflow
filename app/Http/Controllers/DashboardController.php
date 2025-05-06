<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get tasks for the authenticated user
        $tasks = []; // TODO: Replace with actual task retrieval once Task model is created
        
        
        // Get upcoming deadlines (next 5 tasks)
        $upcomingTasks = []; // TODO: Replace with actual upcoming tasks
        
        
        return view('dashboard', compact('tasks', 'upcomingTasks', 'user'));
    }
}