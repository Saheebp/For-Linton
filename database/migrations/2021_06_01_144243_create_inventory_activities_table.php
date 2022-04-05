<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('quantity')->nullable()->default(null);
            $table->string('type')->nullable()->default('Disburse');
            
            $table->unsignedBigInteger('inventory_id')->nullable()->default(null);
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('restrict');
            
            $table->unsignedBigInteger('inventory_item_id')->nullable()->default(null);
            $table->foreign('inventory_item_id')->references('id')->on('inventory_items')->onDelete('restrict');
            
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('receiver_id')->nullable()->default(null);
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_activities');
    }
}
