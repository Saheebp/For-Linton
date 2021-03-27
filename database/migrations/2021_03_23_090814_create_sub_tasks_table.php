<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name');
            $table->string('startdate')->nullable()->default(null);
            $table->string('enddate')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->string('budget')->nullable()->default(null);
            $table->unsignedBigInteger('executor')->nullable()->default(null);

            $table->unsignedBigInteger('task_id')->nullable()->default(null);
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');

            $table->unsignedBigInteger('status_id')->nullable()->default(null);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
            
            $table->unsignedBigInteger('group_id')->nullable()->default(null);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_tasks');
    }
}
