<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Models\UserRole;

class TaskPolicy
{
    public function view(User $user, Task $task)
    {
        return $user->id === $task->assigned_to ||
            $user->id === $task->created_by ||
            $user->role->role === 'admin';
    }

    public function create(User $user)
    {
        return in_array($user->role->role, ['admin', 'team_member']);
    }

    public function update(User $user, Task $task)
    {
        return $user->id === $task->created_by ||
            $user->role->role === 'admin';
    }

    public function delete(User $user, Task $task)
    {
        return $user->id === $task->created_by ||
            $user->role->role === 'admin';
    }
}