<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proc_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            
            $table->unsignedBigInteger('creator_id')->nullable()->default(null);
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('proc_request_id')->nullable()->default(null);
            $table->foreign('proc_request_id')->references('id')->on('proc_requests')->onDelete('restrict');

            $table->unsignedBigInteger('proc_quote_id')->nullable()->default(null);
            $table->foreign('proc_quote_id')->references('id')->on('proc_quotes')->onDelete('restrict');
            
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
        Schema::dropIfExists('proc_files');
    }
}
