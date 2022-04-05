<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreatTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('great_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('mid')->nullable()->default(null);

            $table->string('name');
            $table->date('start')->nullable()->default(null);
            $table->date('end')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->string('order')->nullable()->default(null);
            $table->string('budget')->nullable()->default(null);
            $table->string('actual_cost')->nullable()->default(null);

            $table->string('longitude')->nullable()->default(null);
            $table->string('latitude')->nullable()->default(null);
            
            $table->unsignedBigInteger('executor_id')->nullable()->default(null);
            $table->foreign('executor_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('task_id')->nullable()->default(null);
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');

            $table->unsignedBigInteger('sub_task_id')->nullable()->default(null);
            $table->foreign('sub_task_id')->references('id')->on('sub_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('grand_task_id')->nullable()->default(null);
            $table->foreign('grand_task_id')->references('id')->on('grand_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('status_id')->nullable()->default(null);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
            
            $table->unsignedBigInteger('group_id')->nullable()->default(null);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('restrict');

            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('child_id')->nullable()->default(null);

            $table->unsignedBigInteger('preceedby')->nullable()->default(null);
            $table->unsignedBigInteger('succeedby')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('great_tasks');
    }
}
