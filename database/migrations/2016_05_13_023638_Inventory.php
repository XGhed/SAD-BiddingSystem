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
            $table->string('defect', 50);
            $table->timestamp('InventoryDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('ItemID')->unsigned();
            $table->integer('WarehouseNo')->unsigned()->nullable();
            $table->foreign('ItemID')->references('ItemID')->on('Items');
            $table->foreign('WarehouseNo')->references('WarehouseNo')->on('Warehouse');
        });
    }

    public function down()
    {
        schema::drop('Inventory');
    }
}
