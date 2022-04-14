<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('name')->nullable(false);
            $table->string('description')->nullable()->default(null);

            $table->unsignedBigInteger('status_id')->default(config('new'));
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');

            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
