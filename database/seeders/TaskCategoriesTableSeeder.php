<?php

namespace Database\Seeders;

use App\Models\TaskCategory;
use Illuminate\Database\Seeder;

class TaskCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Administrative', 'description' => 'Office administration tasks'],
            ['name' => 'HR', 'description' => 'Human resources related tasks'],
            ['name' => 'Finance', 'description' => 'Financial and accounting tasks'],
            ['name' => 'IT', 'description' => 'Information technology tasks'],
            ['name' => 'Facilities', 'description' => 'Building and facilities maintenance'],
        ];

        foreach ($categories as $category) {
            TaskCategory::create($category);
        }
    }
}

// database/seeders/UsersTableSeeder.php
namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@southpoint.com',
            'password' => Hash::make('password'),
        ]);
        
        UserRole::create([
            'user_id' => $admin->id,
            'role' => 'admin',
        ]);

        $teamMember = User::create([
            'name' => 'Team Member',
            'email' => 'member@southpoint.com',
            'password' => Hash::make('password'),
        ]);
        
        UserRole::create([
            'user_id' => $teamMember->id,
            'role' => 'team_member',
        ]);

        $guest = User::create([
            'name' => 'Guest User',
            'email' => 'guest@southpoint.com',
            'password' => Hash::make('password'),
        ]);
        
        UserRole::create([
            'user_id' => $guest->id,
            'role' => 'guest',
        ]);
    }
}

// database/seeders/TasksTableSeeder.php
namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            [
                'title' => 'Update employee records',
                'description' => 'Review and update all employee records in the HR system',
                'category_id' => 2,
                'assigned_to' => 2,
                'created_by' => 1,
                'priority' => 'high',
                'status' => 'pending',
                'deadline' => Carbon::now()->addDays(3),
            ],
            [
                'title' => 'Prepare quarterly report',
                'description' => 'Compile financial data and prepare the quarterly report',
                'category_id' => 3,
                'assigned_to' => 1,
                'created_by' => 1,
                'priority' => 'medium',
                'status' => 'in_progress',
                'deadline' => Carbon::now()->addDays(5),
            ],
            [
                'title' => 'Fix printer in reception',
                'description' => 'The printer in reception area is not working properly',
                'category_id' => 5,
                'assigned_to' => 3,
                'created_by' => 1,
                'priority' => 'low',
                'status' => 'pending',
                'deadline' => Carbon::now()->addDays(1),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}