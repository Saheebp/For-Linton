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
            $table->string('phone')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('email')->unique();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('profile_update_status')->nullable()->default(0);
            
            $table->unsignedBigInteger('status_id')->nullable()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');

            $table->unsignedBigInteger('designation_id')->nullable()->default(null);
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('restrict');

            $table->string('org_name')->nullable()->default(null);
            $table->string('org_email')->nullable()->default(null);
            $table->string('org_phone')->nullable()->default(null);
            $table->string('org_address')->nullable()->default(null);
            $table->string('org_logo')->nullable()->default(null);
            $table->string('org_nature')->nullable()->default(null);
            $table->string('org_quote_count')->nullable()->default(null);

            $table->string('is_admin')->nullable()->default("false");
            $table->string('is_contractor')->nullable()->default("false");
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
