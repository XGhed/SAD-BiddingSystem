<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Container extends Migration
{
    public function up()
{

    Schema::create('Container', function(Blueprint $table)
    {
        $table->increments('ContainerID');
        $table->string('ContainerName', 30);
        $table->integer('SupplierID')->unsigned();
        $table->foreign('SupplierID')->references('SupplierID')->on('Supplier');
    });
}

public function down()
{

    Schema::drop('Container');
    
}
}
