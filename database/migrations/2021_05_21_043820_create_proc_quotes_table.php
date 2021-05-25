<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proc_quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);

            $table->string('url')->nullable()->default(null);
            
            $table->unsignedBigInteger('contractor_id')->nullable()->default(null);
            $table->foreign('contractor_id')->references('id')->on('users')->onDelete('restrict');
            
            $table->unsignedBigInteger('proc_requests_id')->nullable()->default(null);
            $table->foreign('proc_requests_id')->references('id')->on('proc_requests')->onDelete('restrict');

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
        Schema::dropIfExists('proc_quotes');
    }
}
