<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->string('name');
            $table->string('description')->nullable()->default(null);
            $table->string('rating')->nullable()->default(null);
            $table->string('image1')->nullable()->default(null);
            $table->string('image2')->nullable()->default(null);
            $table->string('quantity');
            $table->string('amount');

            $table->string('orders_count')->default(0);
            $table->boolean('visibility')->default(true);

            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            
            $table->unsignedBigInteger('brand_id')->nullable()->default(null);
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');

            $table->unsignedBigInteger('option_id')->nullable()->default(null);
            $table->foreign('option_id')->references('id')->on('attribute_options')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
