<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
            $table->string('logo')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('phone1')->nullable()->default(null);
            $table->string('phone2')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('web_url')->nullable()->default(null);
            $table->string('facebook_url')->nullable()->default(null);
            $table->string('instagram_url')->nullable()->default(null);
            $table->string('twitter_url')->nullable()->default(null);
            $table->string('youtube_url')->nullable()->default(null);

            $table->string('slide1')->nullable()->default(null);
            $table->string('slide2')->nullable()->default(null);
            $table->string('slide3')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
