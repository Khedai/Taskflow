<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->foreignId('category_id')->constrained('task_categories');
    $table->foreignId('assigned_to')->constrained('users');
    $table->foreignId('created_by')->constrained('users');
    $table->enum('priority', ['low', 'medium', 'high']);
    $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
    $table->dateTime('deadline');
    $table->timestamps();
    $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
