<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventory extends Migration
{
    public function up()
    {
        schema::create('Inventory', function(Blueprint $table)
        {
            $table->increments('InventoryNo');
            $table->string('description', 50);
            $table->string('status', 30);
            $table->integer('quantity');
            $table->datetime('InventoryDate');
            $table->integer('ItemTransacNo')->unsigned();
            $table->foreign('ItemTransacNo')->references('ItemTransacNo')->on('ItemTransaction');
            $table->integer('ItemID')->unsigned();
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }

    public function down()
    {
        schema::drop('Inventory');
    }
}
