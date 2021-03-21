<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('profile_update_status')->default(0);

            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');

            $table->string('phone')->default(null);
            $table->string('address')->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('order_count')->nullable()->default(null);

            $table->string('is_admin')->nullable()->default("false");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
