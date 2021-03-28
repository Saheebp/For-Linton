<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name');
            $table->dateTime('startdate')->nullable()->default(null);
            $table->dateTime('enddate')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->string('budget')->nullable()->default(null);
            $table->string('owner')->nullable()->default(null);
            
            $table->unsignedBigInteger('manager')->nullable()->default(null);
            $table->unsignedBigInteger('creator')->nullable()->default(null);

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
        Schema::dropIfExists('projects');
    }
}
