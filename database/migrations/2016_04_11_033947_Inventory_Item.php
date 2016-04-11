<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryItem extends Migration
{
   
    public function up()
    {
        schema::create('InventoryItem', function(Blueprint $table){
            $table->primary(array('InventoryNo','ItemID'));
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->integer('InventoryNo')->unsigned();
            $table->integer('ItemID')->unsigned();
            $table->foreign('InventoryNo')->references('InventoryNo')->on('Inventory');
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }

    public function down()
    {
        schema::drop('InventoryItem');
    }
}
