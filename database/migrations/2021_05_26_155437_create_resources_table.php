<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name');
            $table->string('url')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->unsignedBigInteger('creator_id')->nullable()->default(null);
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('task_id')->nullable()->default(null);
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');
            
            $table->unsignedBigInteger('sub_task_id')->nullable()->default(null);
            $table->foreign('sub_task_id')->references('id')->on('sub_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('group_id')->nullable()->default(null);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('restrict');

            $table->unsignedBigInteger('proc_request_id')->nullable()->default(null);
            $table->foreign('proc_request_id')->references('id')->on('proc_requests')->onDelete('restrict');

            $table->unsignedBigInteger('status_id')->nullable()->default(null);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
