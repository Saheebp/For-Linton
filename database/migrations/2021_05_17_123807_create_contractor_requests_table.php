<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('url')->nullable()->default(null);

            $table->unsignedBigInteger('contractor_id')->nullable()->default(null);
            $table->foreign('contractor_id')->references('id')->on('contractors')->onDelete('restrict');

            $table->unsignedBigInteger('quote_request_id')->nullable()->default(null);
            $table->foreign('quote_request_id')->references('id')->on('quote_requests')->onDelete('restrict');

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
        Schema::dropIfExists('contractor_requests');
    }
}
