<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SupplierItem extends Migration
{
   
    public function up()
    {
        Schema::create('SupplierItem', function(Blueprint $table){
            $table->primary(array('SupplierID', 'ItemID'));
            $table->integer('SupplierID')->unsigned();
            $table->integer('ItemID')->unsigned();
            $table->foreign('SupplierID')->references('SupplierID')->on('Supplier');
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }

   
    public function down()
    {
        Schema::drop('SupplierItem');
    }
}
