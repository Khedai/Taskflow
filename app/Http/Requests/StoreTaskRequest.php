<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:task_categories,id',
            'assigned_to' => 'required|exists:users,id',
            'priority' => ['required', Rule::in(['low', 'medium', 'high'])],
            'status' => ['sometimes', Rule::in(['pending', 'in_progress', 'completed'])],
            'deadline' => 'required|date|after:now',
        ];
    }

    public function messages()
    {
        return [
            'deadline.after' => 'The deadline must be a future date.',
        ];
    }
}

// app/Http/Requests/UpdateTaskRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->task);
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category_id' => 'sometimes|exists:task_categories,id',
            'assigned_to' => 'sometimes|exists:users,id',
            'priority' => ['sometimes', Rule::in(['low', 'medium', 'high'])],
            'status' => ['sometimes', Rule::in(['pending', 'in_progress', 'completed'])],
            'deadline' => 'sometimes|date|after:now',
        ];
    }
}