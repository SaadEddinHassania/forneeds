<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unsinged()->index();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');

            $table->unsignedInteger('service_type_id')->unsigned()->nullable()->index();
           // $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('SET NULL');

            $table->integer('location_meta_id')->unsinged()->nullable()->index();
           // $table->foreign('location_meta_id')->references('id')->on('location_metas')->onDelete('SET NULL');

            $table->tinyInteger('state'); //0null 1pending 2complete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('service_requests');
    }

}
