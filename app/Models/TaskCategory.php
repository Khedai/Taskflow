<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    protected $fillable = ['name', 'description'];

    public function tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Task::class);
    }
}

// app/Models/Task.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'assigned_to',
        'created_by',
        'priority',
        'status',
        'deadline'
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(TaskCategory::class);
    }

    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Accessor for formatted deadline
    public function getFormattedDeadlineAttribute(): string
    {
        return $this->deadline->format('M d, Y H:i');
    }

    // Mutator for priority
    public function setPriorityAttribute($value)
    {
        $this->attributes['priority'] = strtolower($value);
    }

    // Query scope for high priority tasks
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }
}

// app/Models/UserRole.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['user_id', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}