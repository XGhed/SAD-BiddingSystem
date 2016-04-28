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
        $table->integer('RegionID')->unsigned();
        $table->foreign('RegionID')->references('RegionID')->on('Region');
    });
}

public function down()
{
    Schema::drop('Warehouse');
}
}
