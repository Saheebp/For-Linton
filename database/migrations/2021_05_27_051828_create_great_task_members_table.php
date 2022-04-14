<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreatTaskMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('great_task_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('great_task_id')->nullable()->default(null);
            $table->foreign('great_task_id')->references('id')->on('great_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('designation_id')->nullable()->default(null);
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('restrict');

            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('great_task_members');
    }
}
