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
            
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name');
            $table->string('startdate')->nullable()->default(null);
            $table->string('enddate')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->string('order')->nullable()->default(null);
            $table->string('budget')->nullable()->default(null);
            $table->unsignedBigInteger('executor')->nullable()->default(null);

            $table->unsignedBigInteger('status_id')->nullable()->default(null);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');

            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('parent')->nullable()->default(null);
            $table->foreign('parent')->references('id')->on('tasks')->onDelete('restrict');

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
        Schema::dropIfExists('tasks');
    }
}
