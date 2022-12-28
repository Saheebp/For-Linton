<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('name')->nullable(false);

            $table->string('quantity')->nullable()->default(null);
            $table->string('available')->nullable()->default(null);
            $table->string('threshold')->nullable()->default(null);
            $table->string('created_by')->nullable()->default(null);
            $table->date('expiry_date')->nullable()->default(null);
            
            $table->string('image')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('restrict');

            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('restrict');

            $table->unsignedBigInteger('warehouse_item_id')->nullable();
            $table->foreign('warehouse_item_id')->references('id')->on('warehouse_items')->onDelete('restrict');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');

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
        Schema::dropIfExists('inventory_items');
    }
}
