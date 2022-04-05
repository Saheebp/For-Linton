<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('quantity')->nullable()->default(null);
            $table->string('type')->nullable()->default('Disburse');
            
            $table->unsignedBigInteger('warehouse_id')->nullable()->default(null);
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('restrict');
            
            $table->unsignedBigInteger('warehouse_item_id')->nullable()->default(null);
            $table->foreign('warehouse_item_id')->references('id')->on('warehouse_items')->onDelete('restrict');
            
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->string('project')->nullable()->default(null);
            
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
        Schema::dropIfExists('warehouse_activities');
    }
}
