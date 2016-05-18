<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Shipment', function (Blueprint $table){
            $table->increments('ShipmentID');
            $table->integer('ProvinceID')->unsigned();
            $table->boolean('CompanyCourier')->unsigned();
            $table->decimal('ShipmentFee');
            $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
