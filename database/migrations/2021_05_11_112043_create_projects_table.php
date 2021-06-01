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
            $table->softDeletes();

            $table->string('name');
            $table->string('description')->nullable()->default(null);
            $table->string('objective')->nullable()->default(null);
            $table->string('owner')->nullable()->default(null);
            
            $table->date('start')->nullable()->default(null);
            $table->date('end')->nullable()->default(null);

            $table->string('nature')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('funding_source')->nullable()->default(null);
            $table->string('budget')->nullable()->default(null);
            $table->string('actual_cost')->nullable()->default(null);

            $table->string('sponsor_name')->nullable()->default(null);
            $table->string('sponsor_email')->nullable()->default(null);
            $table->string('sponsor_phone')->nullable()->default(null);

            $table->string('state')->nullable()->default(null);
            $table->string('lga')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
         
            $table->unsignedBigInteger('manager_id')->nullable()->default(null);
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('creator_id')->nullable()->default(null);
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');

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
