<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('body')->nullable(false);
            
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');

            $table->unsignedBigInteger('sub_task_id')->nullable();
            $table->foreign('sub_task_id')->references('id')->on('sub_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('grand_task_id')->nullable()->default(null);
            $table->foreign('grand_task_id')->references('id')->on('grand_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('great_task_id')->nullable()->default(null);
            $table->foreign('great_task_id')->references('id')->on('great_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
