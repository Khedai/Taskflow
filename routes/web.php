<?php

use App\Http\Controllers\TaskController; // Ensure this class exists in the specified namespace or create it using artisan if missing
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\ProfileController; // Verify this matches the actual namespace of ProfileController or adjust accordingly
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Tasks routes
    Route::resource('tasks', TaskController::class);
    Route::post('/tasks/{task}/reminder', [TaskController::class, 'sendDeadlineReminder'])
         ->name('tasks.reminder');
    
    // Task categories routes (admin only)
    Route::middleware('can:admin')->group(function () {
        Route::resource('categories', TaskCategoryController::class)->except('show');
    });
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Ensure ProfileController exists in the specified namespace
});

require __DIR__.'/auth.php';