{{-- resources/views/emails/task_reminder.blade.php --}}
@component('mail::message')
# Task Deadline Reminder

The task **{{ $task->title }}** is due on **{{ $task->formatted_deadline }}**.

**Priority:** {{ ucfirst($task->priority) }}
**Status:** {{ str_replace('_', ' ', ucfirst($task->status)) }}
**Category:** {{ $task->category->name }}

@component('mail::button', ['url' => route('tasks.show', $task)])
View Task
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent

<!-- filepath: c:\Users\mogwa\south-point-tasks\resources\views\emails\task_deadline_reminder.blade.php -->
<p>Dear {{ $task->user->name }},</p>
<p>This is a reminder that the task "{{ $task->title }}" is due on {{ $task->deadline }}.</p>