<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WarehouseItem extends Migration
{
  
    public function up()
    {
        Schema::create('WarehouseItem', function (Blueprint $table){
            $table->integer('WarehouseNo')->unsigned();
            $table->integer('ItemID')->unsigned();
            $table->foreign('WarehouseNo')->references('WarehouseNo')->on('Warehouse');
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }

    public function down()
    {
        schema::drop('WarehouseItem');
    }
}
