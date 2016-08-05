<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceProviders extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('mission_statement');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('service_provider_type_id')->unsigned()->nullable()->index();
            $table->foreign('service_provider_type_id')->references('id')->on('service_provider_types')->onDelete('SET NULL');

            $table->integer('sector_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('service_providers');
    }

}
