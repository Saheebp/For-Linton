<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->string('body')->nullable(false);
            
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');

            $table->unsignedBigInteger('sub_tasks_id')->nullable();
            $table->foreign('sub_tasks_id')->references('id')->on('sub_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('status_id')->default(13);
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
        Schema::dropIfExists('comments');
    }
}
