<?php
// filepath: c:\Users\mogwa\south-point-tasks\app\Mail\TaskDeadlineReminder.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

// Example usage
Mail::send(new TaskDeadlineReminder($task));

class TaskDeadlineReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     *
     * @param $task
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Task Deadline Reminder')
                    ->view('emails.task_deadline_reminder');
    }
}