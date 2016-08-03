<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('avatar'); //user image
            $table->timestamp('dob');
            $table->integer('location_meta_id')->unsigned()->index();
            $table->string('facebook_token');
            $table->string('facebook_id');
            $table->string('google_token');
            $table->string('google_id');
            $table->string('national_id')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('is_sp')->default(false);
            $table->boolean('is_ready')->default(false);
            $table->string('token')->nullable();
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
