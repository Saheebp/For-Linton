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
            $table->dateTime('duedate')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->string('budget')->nullable()->default(null);
            $table->string('owner')->nullable()->default(null);
            
            $table->unsignedBigInteger('manager_id')->nullable()->default(null);
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('creator_id')->nullable()->default(null);
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');

            // $table->unsignedBigInteger('inventory_id')->nullable()->default(null);
            // $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('restrict');

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
