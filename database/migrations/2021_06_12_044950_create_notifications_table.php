<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->string('body')->nullable(false);
            //$table->string('tag')->nullable();
            
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');

            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict');

            $table->unsignedBigInteger('creator_id')->nullable()->default(null);
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('sub_task_id')->nullable();
            $table->foreign('sub_task_id')->references('id')->on('sub_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('grand_task_id')->nullable()->default(null);
            $table->foreign('grand_task_id')->references('id')->on('grand_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('great_task_id')->nullable()->default(null);
            $table->foreign('great_task_id')->references('id')->on('great_tasks')->onDelete('restrict');

            $table->unsignedBigInteger('request_fq_id')->nullable()->default(null);
            $table->foreign('request_fq_id')->references('id')->on('request_fqs')->onDelete('restrict');

            $table->unsignedBigInteger('payment_id')->nullable()->default(null);
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('restrict');

            $table->unsignedBigInteger('quote_id')->nullable()->default(null);
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('restrict');

            $table->unsignedBigInteger('resource_id')->nullable()->default(null);
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('restrict');

            $table->unsignedBigInteger('status_id')->default(13);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
