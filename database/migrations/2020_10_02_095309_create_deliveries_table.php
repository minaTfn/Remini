<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('origin_country_id');
            $table->unsignedInteger('origin_city_id');
            $table->unsignedInteger('destination_country_id');
            $table->unsignedInteger('destination_city_id');
            $table->unsignedInteger('delivery_method_id');
            $table->unsignedInteger('payment_method_id');
            $table->date('maximum_deadline')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->unsignedInteger('thumbnail_photo_id')->nullable();
            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('origin_country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->foreign('origin_city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('destination_country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->foreign('destination_city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->cascadeOnDelete();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
