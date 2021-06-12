<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_fqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
            $table->string('subject')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->date('start')->nullable()->default(null);
            $table->date('end')->nullable()->default(null);
            $table->string('total_cost')->nullable()->default(null);

            $table->unsignedBigInteger('department_id')->nullable()->default(null);
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');

            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('status_id')->default(6);
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
        Schema::dropIfExists('request_fqs');
    }
}
