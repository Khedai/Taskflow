<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TaskCategory;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskDeadlineReminder;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:view,task')->only('show');
        $this->middleware('can:update,task')->only('edit', 'update');
        $this->middleware('can:delete,task')->only('destroy');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $query = Task::with(['category', 'assignedUser', 'creator']);

        if ($user->role->role !== 'admin') {
            $query->where('assigned_to', $user->id)
                ->orWhere('created_by', $user->id);
        }

        $tasks = $query->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = TaskCategory::all();
        $users = User::all();
        return view('tasks.create', compact('categories', 'users'));
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();

        $task = Task::create($validated);

        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = TaskCategory::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'categories', 'users'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}


namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskDeadlineReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
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
                    ->view('emails.task_deadline_reminder')
                    ->with(['task' => $this->task]);
    }
}