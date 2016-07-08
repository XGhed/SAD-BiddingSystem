<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Container extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('Containers', function(Blueprint $table)
        {
            $table->increments('ContainerID');
            $table->string('ContainerName', 50);
            $table->datetime('Arrival');
            $table->integer('SupplierID')->unsigned();
            $table->integer('WarehouseNo')->unsigned();
            $table->foreign('SupplierID')->references('SupplierID')->on('Supplier');
            $table->foreign('WarehouseNo')->references('WarehouseNo')->on('Warehouse');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('Containers');
    }
}
