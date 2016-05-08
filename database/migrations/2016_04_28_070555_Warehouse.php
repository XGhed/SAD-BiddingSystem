<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Warehouse extends Migration
{
  
public function up()
{
    schema::create('Warehouse', function(Blueprint $table)
    {
        $table->increments('WarehouseNo');
        $table->string('Barangay_Street_Address', 50);
        $table->integer('CityID')->unsigned();
        $table->foreign('CityID')->references('CityID')->on('City');
        $table->boolean('Status')->default(1);
        $table->softDeletes();
    });
}

public function down()
{
    Schema::drop('Warehouse');
}
}
