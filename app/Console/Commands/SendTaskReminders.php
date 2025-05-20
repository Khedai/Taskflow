<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Mail\TaskDeadlineReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTaskReminders extends Command
{
    protected $signature = 'tasks:send-reminders';
    protected $description = 'Send email reminders for upcoming task deadlines';

    public function handle()
    {
        $tasks = Task::where('status', '!=', 'completed')
                    ->whereBetween('deadline', [now(), now()->addDay()])
                    ->get();

        foreach ($tasks as $task) {
            Mail::to($task->assignedUser->email)
                ->send(new TaskDeadlineReminder($task));
            
            $this->info("Sent reminder for task: {$task->title} to {$task->assignedUser->email}");
        }

        $this->info("Sent {$tasks->count()} reminders.");
    }
}