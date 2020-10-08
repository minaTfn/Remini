<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryContactMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_contact_method', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_id')->unsigned()->index();
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');

            $table->integer('contact_method_id')->unsigned()->index();
            $table->foreign('contact_method_id')->references('id')->on('contact_methods')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_contact_method');
    }
}
