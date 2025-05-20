@extends('layouts.app')

@section('title', 'Task Details')

@section('content_header')
    <h1>Task Details</h1>
    <div class="float-right">
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary mr-2">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Basic Information</h4>
                    <p><strong>Title:</strong> {{ $task->title }}</p>
                    <p><strong>Description:</strong> {{ $task->description }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge badge-{{ 
                            $task->status == 'completed' ? 'success' : 
                            ($task->status == 'in_progress' ? 'primary' : 'secondary') 
                        }}">
                            {{ str_replace('_', ' ', ucfirst($task->status)) }}
                        </span>
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Additional Details</h4>
                    <p><strong>Category:</strong> {{ $task->category->name }}</p>
                    <p><strong>Priority:</strong>
                        <span class="badge badge-{{ 
                            $task->priority == 'high' ? 'danger' : 
                            ($task->priority == 'medium' ? 'warning' : 'success') 
                        }}">
                            {{ ucfirst($task->priority) }}
                        </span>
                    </p>
                    <p><strong>Assigned To:</strong> {{ $task->assignedUser->name }}</p>
                    <p><strong>Created By:</strong> {{ $task->creator->name }}</p>
                    <p><strong>Deadline:</strong> {{ $task->formatted_deadline }}</p>
                    <p><strong>Created At:</strong> {{ $task->created_at->format('M d, Y H:i') }}</p>
                </div>
            </div>

            @if($task->status != 'completed' && $task->deadline < now()->addDay())
                <div class="mt-4">
                    <form action="{{ route('tasks.reminder', $task) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-bell"></i> Send Deadline Reminder
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@stop