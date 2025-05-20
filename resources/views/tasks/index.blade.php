{{-- resources/views/tasks/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Tasks')

@section('content_header')
    <h1>Tasks</h1>
    <div class="float-right">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Task
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Assigned To</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->category->name }}</td>
                        <td>{{ $task->assignedUser->name }}</td>
                        <td>
                            <span class="badge badge-{{ 
                                $task->priority == 'high' ? 'danger' :
        ($task->priority == 'medium' ? 'warning' : 'success') 
                            }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ 
                                $task->status == 'completed' ? 'success' :
        ($task->status == 'in_progress' ? 'primary' : 'secondary') 
                            }}">
                                {{ str_replace('_', ' ', ucfirst($task->status)) }}
                            </span>
                        </td>
                        <td>{{ $task->formatted_deadline }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @if($task->status != 'completed' && $task->deadline < now()->addDay())
                            <form action="{{ route('tasks.reminder', $task) }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-bell"></i> Remind
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Tasks page loaded!'); </script>
@stop

@extends('layouts.app')

@section('title', 'Tasks')

@section('content_header')
<h1>Tasks</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary float-right">
    <i class="fas fa-plus"></i> Create Task
</a>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <!-- Table content as shown earlier -->
        </table>
        {{ $tasks->links() }}
    </div>
</div>
@stop