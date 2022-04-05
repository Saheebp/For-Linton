<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('grand_task_id')->nullable()->default(null);
            $table->foreign('grand_task_id')->references('id')->on('grand_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('great_task_id')->nullable()->default(null);
            $table->foreign('great_task_id')->references('id')->on('great_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('sub_task_id')->nullable()->default(null);
            $table->foreign('sub_task_id')->references('id')->on('sub_tasks')->onDelete('restrict');
            
            $table->unsignedBigInteger('task_id')->nullable()->default(null);
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');

            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('user_id')->nullable()->default(null);
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
        Schema::dropIfExists('team_members');
    }
}
